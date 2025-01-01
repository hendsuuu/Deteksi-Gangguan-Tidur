from flask import Flask, request, jsonify
import joblib
import numpy as np

app = Flask(__name__)

# Load the model
model = joblib.load('joblib/model.joblib')

# Load encoders for categorical features
gender_encoder = joblib.load('joblib/Gender_encoder.joblib')
bmi_encoder = joblib.load('joblib/BMI Category_encoder.joblib')
occupation_encoder = joblib.load('joblib/Occupation_encoder.joblib')
quality_sleep_encoder = joblib.load('joblib/Quality of Sleep_encoder.joblib')
stress_level_encoder = joblib.load('joblib/Stress Level_encoder.joblib')

# Load scaler
scaler = joblib.load('joblib/scaler.joblib')

def preprocess_input(features):
    try:
        # Encode categorical features using the loaded encoders
        features[7] = gender_encoder.transform([features[7]])[0]  # Gender
        features[8] = occupation_encoder.transform([features[8]])[0]  # Occupation
        features[9] = bmi_encoder.transform([features[9]])[0]    # BMI Category
        # features[10] = quality_sleep_encoder.transform([features[10]])[0]  # Quality of Sleep
        # features[11] = stress_level_encoder.transform([features[11]])[0]  # Stress Level

        # Scale numerical features using the loaded scaler
        # features = np.array(features).reshape(1, -1)  # Reshape for scaler
        # features = scaler.transform(features)[0]
    except Exception as e:
        raise ValueError(f"Error in preprocessing: {e}")

    return features

@app.route('/', methods=['GET'])
def home():
    return "Decision Tree Prediction API is running!"

@app.route('/predict', methods=['POST'])
def predict():
    try:
        # Parse JSON input
        data = request.get_json()
        features = data['features']  # Expecting a JSON with a 'features' key
        # print(features[8])
        gender = features[7]
        occupation = features[8]
        bmi = features[9]
        # Ensure features are in the right format (e.g., [[...]] for scikit-learn models)
        if not isinstance(features[0], list):
            features = [features]

        # Preprocess the input features
        preprocessed_features = [preprocess_input(f) for f in features]

        # Convert to numpy array for model input
        preprocessed_features = np.array(preprocessed_features)

        # Make prediction and get probabilities
        predictions = model.predict(preprocessed_features)
        probabilities = model.predict_proba(preprocessed_features)

        # Map predictions to categories
        category_mapping = {1: "Normal", 2: "Sleep Apnea", 0: "Insomnia"}
        categories = [category_mapping.get(pred, "Unknown") for pred in predictions]

        # Extract confidence scores for predicted classes
        confidences = [prob[np.argmax(prob)] for prob in probabilities]

        # Format response
        response = {
            "predictions": predictions.tolist()[0],
            "categories": categories[0],
            "gender": gender,
            "occupation": occupation,
            "bmi": bmi,
            "confidences": confidences[0],
        }

        return jsonify(response)

    except Exception as e:
        return jsonify({"error": str(e)})


if __name__ == '__main__':
    app.run(debug=True)
