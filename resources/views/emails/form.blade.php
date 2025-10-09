
<?php
use App\Models\FormSetting;

$form=FormSetting::where('setting','General')->first();

$placeholders = ['{NAME}', '{APPLICATION_LINK}'];
$replacements = [$name, $applicationLink];

$updatedText = str_replace($placeholders, $replacements, $form->email_text);
echo $updatedText;
?>


<!-- <!DOCTYPE html><html><head></head><body><p>Dear {{ $name }},</p>
    <p>Thank you for choosing Main Street Finance Group and submitting your information. We're excited to inform you that based on the details provided, you qualify for a loan through one of our programs. To proceed further, kindly complete our quick 5 minute application by following this link: <a href="{{ $applicationLink }}">APPLICATION</a>. Additionally, please upload your business bank statements from the last 3 months. This will enable us to tailor the loan terms to best suit your needs. Rest assured, we are here to assist you at every step of the application process. If you have any questions or need guidance, don't hesitate to reach out.</p>
    <p>Thank you once again for choosing Main Street Finance Group. We look forward to assisting you in securing the funding you require for your business.</p>
    <p>Best regards,</p>
    <p>Main Street Finance Group Support Team</p>
    <p>Email: <a href="mailto:support@mainstreetfinancegroup.net">support@mainstreetfinancegroup.net</a></p>
    <p>Phone: (866) 739-5558</p>
    <p>Address:  4485 Stirling Road, Ste 110, Dania Beach, FL 33314</p>
    <p>Main Street Finance Group</p></body></html> -->
