<?php

namespace App\Traits;

// use App\Models\ErrorLog;

use App\Models\ErrorLog;
use Illuminate\Support\Facades\Http;
use App\Models\MCAFileForAdmin;
use App\Models\MCAReportForAdmin;

trait McaReportTrait
{
    public function promt()
    {
        $prompt = '<<<HTML
        Carefully scan each PDF document multiple times to ensure all relevant information is meticulously extracted. Check the readability of each file and record any discrepancies. Create a comprehensive MCA Loan Evaluation Report for businesses seeking financing.
        Information Extraction: Prioritize extracting essential details such as business information, summaries of bank statements, insights from credit reports, and other pertinent financial data.

        Important:
        - Rely solely on information contained in the documents and avoid assumptions. Clearly cite all sources.
        - If a scanned file is unreadable or missing, clearly identify the file name and specify the issue (e.g., upload error, content unreadability).
        - Exclude comments, recommendations, or suggestions from the report, except within the HTML code.
        - Adhere to these professional style guidelines for HTML structure:
        - Omit a section if it lacks sufficient information.
        - Refrain from fabricating information not present in the attached files; avoid placeholders.

        Use the following HTML style as a guideline:
        Container: Max-width of 900px, centered, with a white background and soft shadow effects.
        Headings: Styled with a solid blue left border and padding to delineate clear section breaks.
        Tables: Employed for organized data presentation.
        Table Styling: Alternating row colors for improved readability, bordered rows, and bold headers with a blue background and white text.
        Color Coding:
        Green for "Safe" or positive indicators.
        Orange for "Moderate Risk" or caution indicators.
        Red for "High Risk" or conditions warranting automatic decline.
        Sections: Distinctly separated using light blue or gray background highlights for enhanced readability.
        Font & Spacing: Utilize a legible sans-serif font, with adequate padding and spacing for a polished presentation.
        Bold the response to distinguish it from the criteria.

        The report should include the following structured sections:
        Very Important:
        - Re-scan the relevant file before proceeding with each section to confirm the accuracy and relevance of the information.

        SECTION: Included File: List all scanned file names included in the report. Verify and report if each file is readable. A complete set should have three bank statements, one credit report, and one application file. Assess the extractability of each file.
        SECTION: Business Information: Scan all attached files to locate necessary information (e.g., business name and address, which could also appear in bank statements) and display the Business Name, Address, EIN, SSN, Industry, and any relevant info. Cross-verify the information from all documents.
        SECTION: Bank Statement Summary: Extract and display the starting balance, total deposits, total withdrawals, ending balance, and overdrafts for each of the last three months. Emphasize overdrafts in red and their impact on loan approval.
        SECTION: Overdraft Summary: Extract and thoroughly summarize detailed information about overdrafts from the bank statements.
        SECTION: Credit Report Analysis: Extract and utilize all information from the attached credit report, including crucial details like the FICO Score, types and statuses of Bankruptcies, Delinquencies, Credit Inquiries, and Total Debt Load. Use a table to classify these factors as Low, Medium, or High Risk, including a brief analysis summary.
        SECTION: Red Flag Auto-Decline Check: List auto-decline criteria and state applicability, such as recent bankruptcies and credit scores below 450. Consider factors like businesses less than 3 months old, high chargeback industries (Gambling, Adult, Crypto, etc.), nonprofits, and a minimum average of 4 deposits per month.
        SECTION: General Approval Criteria Check: Examine criteria, marking pass with a green check or fail with a red mark. Considerations include revenue, ending balances, number of loans, repayment capacity, retained revenue, and credit score preferences.
        SECTION: MCA Loan Risk Assessment: Evaluate financial risks, stability of cash flow, and adequacy of revenue for MCA payments, indicating Safe, Moderate, or High Risk.
        SECTION: Analysis of Existing MCA Loans: Review documents for active business loans and report their status.
        SECTION: Dynamic MCA Loan Recommendation: Present three loan options labeled Low-Risk, Moderate-Risk, and High-Risk. Analyze cash flow, credit history, and bank balance trends to dynamically calculate recommended funding levels.
        SECTION: Final MCA Loan Recommendation: Summarize the approval process and provide a status outcome (Approved, Approved with Caution, Declined), highlighting the main factors for each decision.

        Do not include header or body tags, and begin with the company name in the first line. For example and reference only, the output format would be:

        <style>
            body {
                font-family: Arial, sans-serif;
                background-color: #f4f7fc;
                margin: 0;
                padding: 20px;
            }
            .container {
                max-width: 900px;
                margin: auto;
                background: white;
                padding: 20px;
                border-radius: 10px;
                box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            }
            h1 {
                text-align: center;
                color: #2c3e50;
                font-size: 24px;
                border-bottom: 3px solid #3498db;
                padding-bottom: 10px;
            }
            h2 {
                color: #2c3e50;
                font-size: 18px;
                border-left: 4px solid #3498db;
                padding-left: 10px;
                margin-top: 15px;
            }
            .section {
                margin-bottom: 15px;
                padding: 10px;
                border-radius: 8px;
                background: #ecf3fa;
            }
            .highlight {
                font-weight: bold;
                color: #e74c3c;
            }
            .approved {
                font-weight: bold;
                color: #27ae60;
            }
            table {
                width: 100%;
                border-collapse: collapse;
                margin-top: 10px;
            }
            table, th, td {
                border: 1px solid #ddd;
            }
            th {
                background-color: #3498db;
                color: white;
            }
        </style>
        <div class="container">
            <h1>MCA Loan Evaluation Report</h1>

            <div class="section">
                <h2>1. Business Information</h2>
                <p><strong>Business Name:</strong> Business_Name_Here</p>
                <p><strong>Industry:</strong> Industry_Here</p>
                <p><strong>Average Monthly Revenue:</strong></p>
            </div>

            <div class="section">
                <h2>2. Bank Statement Summary</h2>
                <table>
                    <tr>
                        <th>Month</th>
                        <th>Starting Balance</th>
                        <th>Total Deposits</th>
                        <th>Total Withdrawals</th>
                        <th>Ending Balance</th>
                        <th>Overdrafts</th>
                    </tr>
                    <tr>
                        <td>December</td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td class="approved">No</td>
                    </tr>
                </table>
            </div>

            <div class="section">
                <h2>3. MCA Loan Recommendation</h2>
                <p><strong>Recommended Loan Amount:</strong> <span class="approved"></span></p>
                <ul>
                    <li>Keeps daily repayments below 10% of daily revenue</li>
                    <li>Maintains strong cash reserves</li>
                    <li>No overdraft risk, reducing lender concerns</li>
                </ul>
            </div>
        </div>

        HTML';

        return $prompt;
    }
    private function getFileAuthenticity($file_text)
    {
        $input = 'File Authenticity Check: Review the provided text data to determine if the info is authentic and not a forgery. Look for signs of tampering, inconsistencies, or missing information that would indicate the file is not genuine. Response with only "Authentic" if the file is genuine, otherwise return "Not Authentic". Also check if there has data of at least three months bank statement';

        return $this->getResponseFromGpt($file_text, $input);
    }
    private function getFileInfo($file_id)
    {
        $input = 'Included Files Summary: List all uploaded files and assess their readability. For each file, determine if the content is readable (i.e., successfully extracted and parsed) or unreadable (e.g., due to poor scan quality, upload issues, or non-text format). Include a short note about each files status.

        Format the output as an HTML block without additional comments like this:

        <div class="section">
            <h2>Included Files</h2>
            <table>
                <tr><th>File Name</th><th>Status</th><th>Notes</th></tr>
                <tr><td>filename.pdf</td><td>Readable</td><td>Transaction data extracted</td></tr>
                ...
            </table>
        </div>

        Use green text for "Readable" and red for "Unreadable". Keep the layout clean and easy to scan.
        ';

        $response = $this->getResponseFromGpt($file_id, $input);
        return $response;
    }
    private function getCompanyName($file_texts)
    {
        $input = "Find the company/business/owner name who apply for the loan, give that name only, not any other word. Response with the name only, if not found simple return 'Unknown'.";

        return $this->getResponseFromGpt($file_texts, $input);
    }
    private function getOwnerFullName($file_texts)
    {
        $input = "Find the business owner name who apply for the loan, give that name only, not any other word. Response with the name only, if not found simple return 'Unknown'.";

        return $this->getResponseFromGpt($file_texts, $input);
    }
    private function getOwnerCreditScore($file_texts)
    {
        $input = "Credit Report Analysis: Review the provided taxt data Experian credit report and generate. FICO Score — include reason if no score is available (e.g., code 9002). Response with the FICO Score only, if not found simple return 'Unknown'";

        return $this->getResponseFromGpt($file_texts, $input);
    }
    private function getBusinessInformation($file_texts)
    {
        $input = 'Business Information: Review all provided text including bank statements, MCA applications, and credit reports. Extract and cross-verify key details related to the applicants business.
        Format the output as an HTML block without additional comments like this:
        Use only confirmed information. Do not assume values. Include the following fields if found:

        - Business Name
        - Address
        - Industry
        - SSN (for sole proprietors or personal-guaranteed businesses)
        - EIN (if listed)
        - Average Monthly Revenue (based on bank statements)
        - Relevant Info (e.g., alternate business names, bank used, DBA)
        - Note (any missing info, inconsistencies, or warnings)

        Format the output as:

        <div class="section">
            <h2>1. Business Information</h2>
            <table>
                <tr><th>Field</th><th>Details</th></tr>
                <tr><td>Business Name</td><td>...</td></tr>
                ...
            </table>
        </div>

        Omit any rows where no information is available. Use a professional tone suitable for an MCA underwriting report.
        ';

        $response = $this->getResponseFromGpt($file_texts, $input);
        return $response;
    }
    private function getBusinessType($file_texts)
    {
        $input = "Business Type: Review all provided text including MCA applications, and credit reports. Extract and cross-verify key details related to the applicants business. And find the business type.
        Format the output as an HTML block without additional comments like this:
        Response with the business type only, if not found simple return 'Unknown'";

        return $this->getResponseFromGpt($file_texts, $input);
    }
    private function getOwnerInformation($file_texts)
    {
        $input = 'Owner Information: Review the provided text. Extract all relevant business owner identity details needed for MCA underwriting. Use only confirmed data from the provided data — do not assume or fabricate any missing info.
        Format the output as an HTML block without additional comments like this:
        Cross-check all provided texts and include any information found, such as:
        - Full Legal Name
        - Aliases or Other Names
        - Date of Birth
        - SSN (last 4 digits only)
        - Home Address
        - Previous Addresses
        - Known Businesses or DBAs
        - Credit Profile Status (e.g., delinquencies, credit score, inquiry activity)
        - State of Residency
        - Ownership Percentage (if stated)
        - Phone Number or Email (if found)
        - Any KYC or ID concerns (e.g., mismatched names, flagged identities)

        Format your output in HTML as follows:

        <div class="section">
            <h2>2. Owner Information</h2>
            <table>
                <tr><th>Field</th><th>Details</th></tr>
                <tr><td>Full Legal Name</td><td>...</td></tr>
                ...
            </table>
        </div>

        Omit any row where the information is completely unavailable. Use formal underwriting tone.
        ';

        $response = $this->getResponseFromGpt($file_texts, $input);
        return $response;
    }
    private function getBankStatementSummary($file_texts)
    {
        $input = 'Bank Statement Analysis Report: Review all text has monthly bank statements and generate a professional MCA-style underwriting report. Use only confirmed data from the provided texts — do not estimate or invent numbers. The report must include:
        Format the output as an HTML block without additional comments like this:<h2>3. Bank Statement Summary</h2>

        Then include the following:

        1. A "Monthly Account Summary" table with:
        - Month
        - Starting Balance
        - Total Deposits
        - Total Withdrawals
        - Ending Balance
        - Overdraft status (mark "Yes" only if the account went negative or balance dropped below $500)
        - Returned items or alerts (e.g., bounced ACH, overdraft fee)

        2. A separate "Risk-Flag Transactions" table that highlights:
        - Main focus on weekly or daily repeated payments (suggesting MCA or loan repayment) Mark in RED if found
        - Zelle or peer-to-peer payments to individuals
        - Recurring service/subscription charges
        - Any unusual or large outflows related to potential liabilities

        3. Below both tables, include a clear underwriting summary that covers:
        - Liquidity behavior (e.g., low ending balances, overdrafts)
        - Revenue strength or inconsistency
        - Any funding red flags or repayment indicators
        - A conclusion with MCA funding recommendation (e.g., “High Risk – Only eligible for low short-term offer”)

        Format everything inside this container:

        <div class="section">
        <h2>3. Bank Statement Summary</h2>
        <h3>Monthly Account Summary</h3>
        <table>...</table>
        <h3>Risk-Flag Transactions</h3>
        <table>...</table>
        </div>

        Be concise, clear, and use factual underwriting language appropriate for MCA analysis.
        ';

        $response = $this->getResponseFromGpt($file_texts, $input);
        return $response;
    }
    private function overdraftSummary($file_texts)
    {
        $input = 'Overdraft Summary: Go through all provided texts data monthly bank statement and extract only true overdraft events — where the posted balance went negative (below $0). Ignore low balances that are still positive (e.g., below $500). For each statement, scan all daily ending balances and transaction history to detect negative balances.
        Format the output as an HTML in one table without additional comments like this or summeries :
        <div class="section">
            <h2>4. Overdraft Summary</h2>
            <table>
                <tr>
                    <th>Date</th>
                    <th>Amount Overdrawn</th>
                    <th>Description</th>
                </tr>
                <tr>
                    <td>01/01/2025</td>
                    <td style="color:red;">-$324.67</td>
                    <td>Account began the month in overdraft</td>
                </tr>
            </table>
			<p>if none Overdrawn found place a short message here</p>
        </div>';

        $response = $this->getResponseFromGpt($file_texts, $input);
        return $response;
    }
    private function getCreditReportAnalysis($file_texts)
    {
        $input = 'Credit Report Analysis: Review the provided taxt data Experian credit report and generate a full MCA-style credit summary. Include all relevant underwriting criteria, and classify each one with a status description and a risk level (Low, Medium, High). Use a simple HTML table format with clear formatting and bullet points for readability.
        Format the output as an HTML with table without additional comments like this:

        Include the following fields:
        1. FICO Score — include reason if no score is available (e.g., code 9002)
        2. Legal Filings — bankruptcies, liens, or judgments
        3. Delinquent Accounts — include balance, type (e.g., child support, collection), and payment status text like “assigned to attorney”
        4. Active Accounts Summary — number of trades, count of delinquent vs. paid/closed
        5. Total Debt Load — total outstanding debt and type (installment vs. revolving)
        6. Credit Inquiries — total inquiries in last 24 months and recent activity
        7. Payment History — patterns such as collections, charge-offs, or repayment issues
        8. Fraud / Discrepancies — note any address conflicts or fraud flags
        Format output in HTML like this:

        <div class="section">
            <h2>5. Credit Report Analysis</h2>
            <table> ... </table>
        </div>
        Use inline styles for color and readability (e.g., red for High Risk).';

        $response = $this->getResponseFromGpt($file_texts, $input);
        return $response;
    }
    private function getRedFlagAutoDeclineCheck($file_texts)
    {
        $input = 'Red Flag Auto-Decline Check: List auto-decline criteria and state applicability, such as recent bankruptcies and credit scores below 450. Consider factors like businesses less than 3 months old, high chargeback industries (Gambling, Adult, Crypto, etc.), nonprofits, and a minimum average of 4 deposits per month. Format your response in html with table like:
            Format the output as an HTML block without additional comments like this:
			<div class="section">
                <h2>6. Red Flag Auto-Decline Check</h2>
				<table> ... </table>
				<p>Summary: ...</p>
            </div>.';

        $response = $this->getResponseFromGpt($file_texts, $input);
        return $response;
    }
    private function getGeneralApprovalCriteria($file_texts)
    {
        $input = 'General Approval Criteria Check: Examine criteria, marking pass with a green check or fail with a red mark. Considerations include revenue, ending balances, number of loans, repayment capacity, retained revenue, and credit score preferences. Format your response in html with table like:
        Format the output as an HTML block without additional comments like this:
            <div class="section">
                <h2>7. General Approval Criteria Check</h2>
				<table> ... </table>
            </div>.';

        $response = $this->getResponseFromGpt($file_texts, $input);
        return $response;
    }
    private function MCALoanRiskAssessment($file_texts)
    {
        $input = 'MCA Loan Risk Assessment: in very short, evaluate financial risks, stability of cash flow, and adequacy of revenue for MCA payments, indicating Safe, Moderate, or High Risk. Format your response in very short and briefly html like: Format the output as an HTML block without additional comments like this:
            <div class="section">
                <h2>8. MCA Loan Risk Assessment</h2>
                  <p></p>
            </div>.';

        $response = $this->getResponseFromGpt($file_texts, $input);
        return $response;
    }
    private function getApprovalRisk($file_texts)
    {
        $input = 'MCA Loan Approval Risk: Evaluate financial risks, stability of cash flow, and adequacy of revenue for MCA payments, any of Safe, Moderate, or High Risk. Response with the risk level only, if not found simple return "Unknown"';

        $response = $this->getResponseFromGpt($file_texts, $input);
        return $response;
    }
    private function getLoanAffordabilityCalculation($file_texts)
    {
        $input = 'MCA Loan Affordability Calculation: Review the applicant’s recent bank statements and credit profile from provided text data to estimate their loan affordability for a merchant cash advance (MCA). Extract relevant data such as average monthly revenue, average ending balance, current debt obligations, and available daily cash flow.

				Use this data to estimate:
				- Daily repayment capacity (based on 10–15% of daily revenue)
				- Safe daily payment amount
				- Estimated MCA loan offer range
				- Risk level for funding

                Format the output as an HTML block without additional comments like this:

				<div class="section">
					<h2>9. MCA Loan Affordability Calculation</h2>
					<table>
						<tr><th>Factor</th><th>Value</th><th>Notes</th></tr>
						...
					</table>
					<p>Summary: ...</p>
				</div>

				Use a clear and simple style. Break down the values in a readable table with a red-colored “High Risk” label if appropriate. Tailor the summary to MCA underwriting language.
        ';

        $response = $this->getResponseFromGpt($file_texts, $input);
        return $response;
    }
    private function getDynamicMCALoanRecommendation($file_texts)
    {
        $input = 'Dynamic MCA Loan Recommendation: Based on the applicants cash flow, credit profile, and bank balance trends, present three MCA loan recommendations using a clean HTML table.

        Each row should represent one of the following risk tiers: Low-Risk, Moderate-Risk, and High-Risk.

        For each tier, provide:
        - Recommended Advance Amount
        - Estimated Daily Payment
        - Estimated Term (range in months)

        Use realistic MCA assumptions (e.g., 1.35–1.5 factor rate, 4–12 month terms, Mon–Fri payments).

        Format the output as an HTML block without additional comments like this:

        <div class="section">
            <h2>10. Dynamic MCA Loan Recommendation</h2>
            <table>
                <tr><th>Risk Tier</th><th>Advance Amount</th><th>Daily Payment</th><th>Term</th></tr>
                ...
            </table>
            <p>Summary: ...</p>
        </div>

        Keep it short, underwriting-focused, and visually scannable. No need to show factor rates or total payback — just daily affordability.
     ';

        $response = $this->getResponseFromGpt($file_texts, $input);
        return $response;
    }
    private function getApprovalAmount($file_texts)
    {
        $input = "Dynamic MCA Loan Approval Amount: Based on the applicants cash flow, credit profile, and bank balance trends, Included below a mca report's affordability calculation and dynamic loan recommendation and final decision summary as data, find out Dynamic MCA Loan Approval Amount if the final decision is approved. Response with the name Approval amount only, if not approved for mca simple return Dcliened.";

        $response = $this->getResponseFromGpt($file_texts, $input);
        return $response;
    }
    private function getFinalDecisionSummary($file_texts)
    {
        $input = 'Final MCA Loan Recommendation: Based on the applicant’s bank statements and credit report from provided text data determine whether the funding request should be Approved, Approved with Caution, or Declined. Clearly summarize the main reasons for the decision, highlighting risk factors such as poor credit, low balances, or cash flow issues.

        Display the final decision as a large <h1> element (red for Declined, green for Approved, orange for Caution).

        Format the output as an HTML block without additional comments like this:

        <div class="section">
            <h2>11. Final MCA Loan Recommendation</h2>
            <h1 style="color:[red|green|orange]">[Status]</h1>
            <p>
                [a very short summary of Underwriting Analysis, use a table to organize  the results]
            </p>
        </div>

        Use bold formatting to emphasize high-risk factors such as "No FICO score", "Delinquent Accounts", "Low Cash Reserves", or "Strong Revenue". Tailor the language to underwriting standards used for MCA evaluations.
        ';

        $response = $this->getResponseFromGpt($file_texts, $input);
        return $response;
    }
    private function getResponseFromGpt($file_texts, $input)
    {
        $OPENAI_API_KEY = $this->api_key;

        $data = "$input provided data is: $file_texts";

        try {
            $messageResponse = Http::withHeaders([
                'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . $OPENAI_API_KEY,
            ])->timeout(120)->post("https://api.openai.com/v1/chat/completions", [
                "model" => "gpt-4.1",
                'messages' => [
                    [
                        "role" => "system",
                        "content" => "You are a helpful assistant."
                    ],
                    [
                        "role" => "user",
                        "content" => $data,
                    ],
                ],
                'temperature' => 0.2,

            ]);

            $response = $messageResponse->json();
            // dd($response);
            $result = 'Unknown';
            if (array_key_exists('choices', $response)) {
                $result = $response['choices'][0]['message']['content'];
            }else{
                ErrorLog::create([
                    'batch_id' => null,
                    'file_name' => 'McaReportTrait',
                    'error_message' => json_encode($response),
                ]);
            }

            $result = str_replace('```html', '', $result);
            $result = str_replace('```', '', $result);
            return $result;
        } catch (\Throwable $th) {
             ErrorLog::create([
                'batch_id' => null,
                'file_name' => 'McaReportTrait',
                'error_message' => $th->getMessage(),
            ]);
            return null;
        }
    }
    private function saveUpdatedReport($ID)
    {
        $report = MCAFileForAdmin::find($ID);
        $text = $report->file_info .
            $report->business_info .
            $report->owner_info .
            $report->bs_summary .
            $report->od_summary .
            $report->cr_analysis .
            $report->rfad_check .
            $report->ga_criteria .
            $report->mr_assessment .
            $report->affordability_calculation .
            $report->dml_recommendation .
            $report->final_decision_summary;

        $styled_text = '<style>
            .container {
                max-width: 900px;
                margin: auto;
                background: white;
                padding: 20px;
                border-radius: 10px;
                box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            }
            h2 {
                color: #2c3e50;
                font-size: 18px;
                border-left: 4px solid #3498db;
                padding-left: 10px;
                margin-top: 15px;
            }
            .section {
                margin-bottom: 15px;
                padding: 10px;
                border-radius: 8px;
                background: #ecf3fa;
            }
            .highlight {
                font-weight: bold;
                color: #e74c3c;
            }
            .approved {
                font-weight: bold;
                color: #27ae60;
            }
            table {
                width: 100%;
                border-collapse: collapse;
                margin-top: 10px;
            }
            table, th, td {
                border: 1px solid #ddd;
            }
            th {
                background-color: #3498db;
                color: white;
            }
        </style> <div class="container">' . $text . '</div>';
        if (!$report->report()->exists()) {
            MCAReportForAdmin::create([
                'm_c_a_assistant_id' => $report->id,
                'response' => $styled_text,
                'status' => 'completed',
                'original_status' => $report->status
            ]);
        } else {
            MCAReportForAdmin::where('m_c_a_assistant_id', $report->id,)->update([
                'response' => $styled_text,
                'status' => 'completed',
            ]);
        }
    }
}
