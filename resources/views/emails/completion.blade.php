<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Your NeuroFit Submission is Complete</title>
  <style>
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }
    body {
      background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
      font-family: 'Segoe UI', Roboto, 'Helvetica Neue', Arial, sans-serif;
      padding: 40px 20px;
      color: #2d3748;
    }
    .email-wrapper {
      max-width: 600px;
      margin: 0 auto;
    }
    .email-container {
      background-color: #ffffff;
      border-radius: 16px;
      overflow: hidden;
      box-shadow: 0 20px 40px rgba(0, 0, 0, 0.15);
    }
    .header {
      background: linear-gradient(135deg, #10b981 0%, #059669 100%);
      color: #fff;
      text-align: center;
      padding: 50px 40px;
      position: relative;
    }
    .header::before {
      content: '';
      position: absolute;
      top: 0;
      left: 0;
      right: 0;
      bottom: 0;
      background: url('data:image/svg+xml,<svg width="100" height="100" xmlns="http://www.w3.org/2000/svg"><circle cx="50" cy="50" r="40" fill="white" opacity="0.05"/></svg>');
      opacity: 0.1;
    }
    .success-icon {
      width: 80px;
      height: 80px;
      background-color: rgba(255, 255, 255, 0.2);
      border-radius: 50%;
      margin: 0 auto 20px;
      display: flex;
      align-items: center;
      justify-content: center;
      backdrop-filter: blur(10px);
      border: 3px solid rgba(255, 255, 255, 0.3);
      animation: scaleIn 0.5s ease-out;
    }
    @keyframes scaleIn {
      from {
        transform: scale(0);
        opacity: 0;
      }
      to {
        transform: scale(1);
        opacity: 1;
      }
    }
    .success-icon svg {
      width: 45px;
      height: 45px;
      fill: white;
    }
    .header h1 {
      margin: 0;
      font-size: 28px;
      font-weight: 700;
      letter-spacing: 0.5px;
      position: relative;
    }
    .header p {
      margin-top: 8px;
      font-size: 15px;
      opacity: 0.95;
      font-weight: 400;
    }
    .content {
      padding: 45px 40px;
    }
    .greeting {
      font-size: 24px;
      color: #059669;
      margin-bottom: 20px;
      font-weight: 600;
    }
    .message-text {
      font-size: 16px;
      line-height: 1.8;
      color: #475569;
      margin-bottom: 25px;
    }
    .success-badge {
      background: linear-gradient(135deg, #d1fae5 0%, #a7f3d0 100%);
      border-left: 4px solid #10b981;
      border-radius: 10px;
      padding: 20px;
      margin: 30px 0;
      text-align: center;
    }
    .success-badge svg {
      width: 50px;
      height: 50px;
      fill: #059669;
      margin-bottom: 12px;
    }
    .success-badge h3 {
      color: #065f46;
      font-size: 18px;
      margin-bottom: 8px;
    }
    .success-badge p {
      color: #047857;
      font-size: 14px;
    }
    .summary-box {
      background: linear-gradient(135deg, #f0f9ff 0%, #e0f2fe 100%);
      border-radius: 12px;
      padding: 25px;
      margin: 25px 0;
      border: 1px solid #bae6fd;
    }
    .summary-title {
      color: #0c4a6e;
      font-size: 18px;
      font-weight: 600;
      margin-bottom: 20px;
      display: flex;
      align-items: center;
      gap: 10px;
    }
    .summary-title svg {
      width: 22px;
      height: 22px;
      fill: #0284c7;
    }
    .summary-item {
      display: flex;
      justify-content: space-between;
      align-items: center;
      padding: 12px 0;
      border-bottom: 1px solid rgba(14, 116, 144, 0.1);
    }
    .summary-item:last-child {
      border-bottom: none;
    }
    .summary-label {
      font-weight: 600;
      color: #334155;
      font-size: 14px;
    }
    .summary-value {
      font-family: 'Courier New', monospace;
      color: #0c4a6e;
      font-weight: 500;
      background-color: rgba(255, 255, 255, 0.7);
      padding: 6px 12px;
      border-radius: 6px;
      font-size: 14px;
    }
    .status-badge {
      display: inline-block;
      background-color: #10b981;
      color: white;
      padding: 6px 16px;
      border-radius: 20px;
      font-size: 13px;
      font-weight: 600;
      text-transform: capitalize;
    }
    .scores-table {
      width: 100%;
      border-collapse: separate;
      border-spacing: 0;
      margin: 25px 0;
      background-color: white;
      border-radius: 10px;
      overflow: hidden;
      box-shadow: 0 2px 8px rgba(0, 0, 0, 0.05);
    }
    .scores-table thead {
      background: linear-gradient(135deg, #0284c7 0%, #0369a1 100%);
      color: white;
    }
    .scores-table th {
      padding: 15px;
      text-align: left;
      font-weight: 600;
      font-size: 14px;
      letter-spacing: 0.3px;
    }
    .scores-table td {
      padding: 14px 15px;
      border-bottom: 1px solid #e2e8f0;
      font-size: 14px;
      color: #475569;
    }
    .scores-table tbody tr:last-child td {
      border-bottom: none;
    }
    .scores-table tbody tr:hover {
      background-color: #f8fafc;
    }
    .scores-table .total-row {
      background-color: #f0f9ff;
      font-weight: 600;
    }
    .scores-table .total-row td {
      color: #0c4a6e;
      font-size: 15px;
    }
    .score-badge {
      display: inline-block;
      background: linear-gradient(135deg, #3b82f6 0%, #2563eb 100%);
      color: white;
      padding: 6px 14px;
      border-radius: 8px;
      font-weight: 600;
      font-size: 14px;
      min-width: 50px;
      text-align: center;
    }
    .button-container {
      text-align: center;
      margin: 35px 0;
    }
    a.button {
      display: inline-flex;
      align-items: center;
      gap: 10px;
      background: linear-gradient(135deg, #2563eb 0%, #1d4ed8 100%);
      color: #fff;
      text-decoration: none;
      padding: 16px 35px;
      border-radius: 10px;
      font-weight: 600;
      font-size: 16px;
      box-shadow: 0 6px 20px rgba(37, 99, 235, 0.4);
      transition: all 0.3s ease;
    }
    a.button:hover {
      background: linear-gradient(135deg, #1d4ed8 0%, #1e40af 100%);
      box-shadow: 0 8px 25px rgba(37, 99, 235, 0.5);
      transform: translateY(-2px);
    }
    a.button svg {
      width: 20px;
      height: 20px;
      fill: white;
    }
    .info-box {
      background-color: #fef3c7;
      border-left: 4px solid #f59e0b;
      border-radius: 10px;
      padding: 18px;
      margin: 25px 0;
      display: flex;
      align-items: start;
      gap: 12px;
    }
    .info-box svg {
      width: 24px;
      height: 24px;
      fill: #f59e0b;
      flex-shrink: 0;
      margin-top: 2px;
    }
    .info-box p {
      color: #78350f;
      font-size: 14px;
      line-height: 1.6;
      margin: 0;
    }
    .next-steps {
      background: linear-gradient(135deg, #f8fafc 0%, #f1f5f9 100%);
      border-radius: 12px;
      padding: 25px;
      margin: 30px 0;
    }
    .next-steps h3 {
      color: #334155;
      font-size: 18px;
      margin-bottom: 18px;
      display: flex;
      align-items: center;
      gap: 10px;
    }
    .next-steps h3 svg {
      width: 22px;
      height: 22px;
      fill: #2563eb;
    }
    .next-steps ul {
      list-style: none;
      padding: 0;
      margin: 0;
    }
    .next-steps li {
      padding: 12px 0;
      padding-left: 35px;
      position: relative;
      color: #475569;
      font-size: 14px;
      line-height: 1.6;
    }
    .next-steps li::before {
      content: '✓';
      position: absolute;
      left: 8px;
      color: #10b981;
      font-weight: bold;
      font-size: 16px;
    }
    .divider {
      height: 1px;
      background: linear-gradient(to right, transparent, #e2e8f0, transparent);
      margin: 35px 0;
    }
    .signature {
      margin-top: 30px;
      padding-top: 25px;
      border-top: 2px solid #f1f5f9;
    }
    .signature p {
      color: #64748b;
      font-size: 15px;
      line-height: 1.7;
    }
    .signature strong {
      color: #334155;
      display: block;
      margin-top: 15px;
      font-size: 16px;
    }
    .footer {
      background: linear-gradient(135deg, #f8fafc 0%, #f1f5f9 100%);
      text-align: center;
      padding: 30px 40px;
      border-top: 1px solid #e2e8f0;
    }
    .footer-links {
      margin-bottom: 20px;
    }
    .footer-links a {
      color: #2563eb;
      text-decoration: none;
      margin: 0 15px;
      font-size: 13px;
      font-weight: 500;
    }
    .footer-links a:hover {
      text-decoration: underline;
    }
    .footer p {
      font-size: 13px;
      color: #64748b;
      line-height: 1.6;
      margin: 8px 0;
    }
    @media only screen and (max-width: 600px) {
      body {
        padding: 20px 10px;
      }
      .header {
        padding: 35px 25px;
      }
      .header h1 {
        font-size: 24px;
      }
      .content {
        padding: 30px 25px;
      }
      .greeting {
        font-size: 20px;
      }
      .summary-item {
        flex-direction: column;
        align-items: flex-start;
        gap: 8px;
      }
      .scores-table {
        font-size: 13px;
      }
      .scores-table th,
      .scores-table td {
        padding: 10px;
      }
    }
  </style>
</head>
<body>
  <div class="email-wrapper">
    <div class="email-container">
      
      <!-- Success Header -->
      <div class="header">
        <div class="success-icon">
          <svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
            <path d="M9 16.17L4.83 12l-1.42 1.41L9 19 21 7l-1.41-1.41z"/>
          </svg>
        </div>
        <h1>Submission Complete!</h1>
        <p>Your intake form has been successfully submitted</p>
      </div>

      <!-- Content Section -->
      <div class="content">
        <h2 class="greeting">Hello {{ $submission->user?->name ?? 'User' }}!</h2>
        
        <p class="message-text">
          Congratulations! Your <strong>{{ $submission->form_name }}</strong> has been completed and successfully submitted. 
          We have received all your information and attached a PDF copy of your submission to this email for your records.
        </p>

        <!-- Success Badge -->
        <div class="success-badge">
          <svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
            <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm-2 15l-5-5 1.41-1.41L10 14.17l7.59-7.59L19 8l-9 9z"/>
          </svg>
          <h3>✓ Successfully Submitted</h3>
          <p>Your information has been securely saved to our system</p>
        </div>

        <!-- Download PDF Button -->
        @if(!empty($submission->pdf_path))
          <div class="button-container">
            <a href="{{ Storage::url($submission->pdf_path) }}" class="button">
              <svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path d="M19 9h-4V3H9v6H5l7 7 7-7zM5 18v2h14v-2H5z"/>
              </svg>
              Download Your PDF
            </a>
          </div>
        @endif

        <!-- Submission Summary -->
        <div class="summary-box">
          <div class="summary-title">
            
            Submission Summary
          </div>
          
          <div class="summary-item">
            <span class="summary-label">Submission ID:</span>
            <span class="summary-value">#{{ $submission->id }}</span>
          </div>
          
          <div class="summary-item">
            <span class="summary-label">Submission Date:</span>
            <span class="summary-value">{{ $submission->created_at?->format('F j, Y') }}</span>
          </div>
          
          <div class="summary-item">
            <span class="summary-label">Status:</span>
            <span class="status-badge">{{ ucfirst($submission->status) }}</span>
          </div>
        </div>

        <!-- Scores Table -->
        @if(!empty($submission->section_scores))
          <div style="margin: 30px 0;">
            <h3 style="color: #0c4a6e; font-size: 18px; margin-bottom: 15px; display: flex; align-items: center; gap: 10px;">
              
              Your Section Scores
            </h3>
            
            <table class="scores-table">
              <thead>
                <tr>
                  <th>Section Name</th>
                  <th style="text-align: right;">Score</th>
                </tr>
              </thead>
              <tbody>
                @foreach($submission->section_scores as $section => $score)
                  <tr>
                    <td>{{ ucwords(str_replace('_', ' ', $section)) }}</td>
                    <td style="text-align: right;">
                      <span class="score-badge">{{ $score }}</span>
                    </td>
                  </tr>
                @endforeach
                <tr class="total-row">
                  <td><strong>Total Score</strong></td>
                  <td style="text-align: right;">
                    <span class="score-badge" style="background: linear-gradient(135deg, #10b981 0%, #059669 100%); font-size: 16px; padding: 8px 16px;">
                      {{ $submission->total_score }}
                    </span>
                  </td>
                </tr>
              </tbody>
            </table>
          </div>
        @endif

        <!-- Next Steps -->
        <div class="next-steps">
          <h3>
            <svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
              <path d="M9 16.17L4.83 12l-1.42 1.41L9 19 21 7l-1.41-1.41z"/>
            </svg>
            What Happens Next?
          </h3>
          <ul>
            <li>Our team will review your submission within 24-48 hours</li>
            <li>You'll receive a follow-up email with next steps</li>
            <li>Your PDF has been saved to your account for future reference</li>
            <li>Feel free to contact us if you have any questions</li>
          </ul>
        </div>

        <!-- Info Box -->
        <div class="info-box">
          <svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
            <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm1 15h-2v-6h2v6zm0-8h-2V7h2v2z"/>
          </svg>
          <p>
            <strong>Need Help?</strong> If you have any questions or concerns about your submission, 
            please don't hesitate to reply to this email or contact us at 
            <a href="mailto:info@neurofitconnections.com" style="color: #2563eb; text-decoration: none;">info@neurofitconnections.com</a>
          </p>
        </div>

        <div class="divider"></div>

        <!-- Signature -->
        <div class="signature">
          <p>
            Thank you for taking the time to complete your intake form. We're excited to begin working with you 
            and look forward to supporting you on your journey.
          </p>
          <strong>
            Best regards,<br>
            The NeuroFit Connections Team
          </strong>
        </div>
      </div>

      <!-- Footer -->
      <div class="footer">
        <div class="footer-links">
          <a href="#">Help Center</a>
          <a href="#">Contact Support</a>
          <a href="#">Privacy Policy</a>
        </div>
        
        <p style="margin-top: 20px;">
          <strong>© {{ date('Y') }} NeuroFit Connections.</strong> All rights reserved.
        </p>
        <p>
          This email was sent to {{ $submission->user?->email ?? 'your email' }}<br>
          Submission ID: #{{ $submission->id }}
        </p>
      </div>

    </div>
  </div>
</body>
</html>