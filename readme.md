# SleepGuard Installation Guide

## Prerequisites
Ensure that the following software is installed on your computer:
- Node.js(18.17.0)
- Python(3.11.7)
- PHP(8.1.10)
- Composer
- XAMPP or Laragon

## Steps to Set Up SleepGuard

### 1. Create the Database
1. Open phpMyAdmin.
2. Create a new database named `sleepguard`.

### 2. Extract the Provided Files
1. Locate the file package provided to you.
2. Extract the contents to a directory of your choice.

### 3. Open the Project in VS Code
1. Launch Visual Studio Code (VS Code).
2. Open the extracted folder in VS Code.

### 4. Start the Python Backend
1. Open a terminal in VS Code.
2. Navigate to the `Model` directory by running:
   ```bash
   cd Model
   ```
3. Start the Python application by running:
   ```bash
   python app.py
   ```
4. Leave this terminal open and running.

### 5. Migrate the Database
1. Open another terminal in VS Code.
2. Navigate to the `Web` directory by running:
   ```bash
   cd Web
   ```
3. Run the migration command to set up the database tables:
   ```bash
   php artisan migrate
   ```

### 6. Start the Laravel Development Server
1. In the same terminal as step 5, start the Laravel development server by running:
   ```bash
   php artisan serve
   ```
2. Note the URL displayed in the terminal (e.g., `http://127.0.0.1:8000/`).

### 7. Compile Frontend Assets
1. Open another terminal in VS Code.
2. Navigate to the `Web` directory by running:
   ```bash
   cd Web
   ```
3. Compile the frontend assets using npm:
   ```bash
   npm run dev
   ```

### 8. Access the Application
1. Open your browser.
2. Navigate to the URL displayed in the terminal from step 6 (e.g., `http://127.0.0.1:8000/`).

## Notes
- Do not close the terminal running `python app.py` in step 4.
- Ensure all services are running properly before accessing the application in your browser.

