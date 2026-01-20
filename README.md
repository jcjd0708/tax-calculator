# Philippine Tax Calculator
[![Ask DeepWiki](https://devin.ai/assets/askdeepwiki.png)](https://deepwiki.com/jcjd0708/tax-calculator.git)

A web-based tax calculator built with PHP that computes income tax and mandatory government contributions based on the Philippine TRAIN Law and current SSS, PhilHealth, and Pag-IBIG contribution tables. This tool provides real-time calculations and detailed breakdowns to help users understand their take-home pay.

You can access a live version of the calculator here: [https://phtaxcalproj.free.nf/](https://phtaxcalproj.free.nf/)

## Features

-   **Automatic Tax Calculation**: Computes income tax based on the TRAIN Law's progressive tax rates.
-   **Mandatory Contributions**: Calculates SSS, PhilHealth, and Pag-IBIG contributions for both employee and employer shares.
-   **Flexible Salary Frequency**: Supports Daily, Weekly, Semi-monthly, Monthly, and Annual salary inputs.
-   **Real-Time Results**: Instantly updates calculations as you input your salary and deductions.
-   **Detailed Breakdowns**: Provides clear separate sections for Tax, SSS, Pag-IBIG, and PhilHealth computations.
-   **Annual Projections**: Displays estimated annual gross income, tax, net pay, and the effective tax rate.
-   **Custom Deductions**: Allows for the addition of optional, non-government deductions such as loans or insurance.
-   **Responsive Design**: A clean, modern interface that works seamlessly on both desktop and mobile devices.

## How to Use

1.  **Enter Gross Salary**: Type your salary amount into the "Gross Salary" field.
2.  **Select Frequency**: Choose your salary an from the dropdown menu (e.g., Monthly, Daily).
3.  **Add Other Deductions (Optional)**: In the "Other Deductions" section, click the `+` button to add any extra deductions.
4.  **View Results**: The calculator automatically processes the input and displays:
    -   A summary of deductions and net pay in the "Tax Computation" section.
    -   Detailed breakdowns for your tax bracket, contributions, and annual projections below the main form.

## Local Setup and Installation

To run this project on a local machine, you will need a local server environment that supports PHP.

### Prerequisites

-   XAMPP, WAMP, MAMP, or any other local server with PHP 7.0 or higher.
-   A modern web browser.

### Installation

1.  Clone the repository:
    ```bash
    git clone https://github.com/jcjd0708/tax-calculator.git
    ```
2.  Move the cloned `tax-calculator` folder into your local server's web root directory (e.g., `htdocs` for XAMPP).
3.  Start the Apache server from your server's control panel (e.g., XAMPP Control Panel).
4.  Open your web browser and navigate to `http://localhost/tax-calculator`.

## Technologies Used

-   **Backend**: PHP
-   **Frontend**: HTML, CSS, JavaScript

## Author

**jcjd0708**  
Bachelor of Science in Computer Science  
Colegio de San Pascual Baylon

*Developed as a project for Programming Languages (PL101).*
