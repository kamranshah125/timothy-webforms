<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Welcome to NeuroFit Connections</title>
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
      background: linear-gradient(135deg, #2563eb 0%, #3b82f6 100%);
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
    .logo-circle {
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
    }
    .logo-circle svg {
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
      color: #1e40af;
      margin-bottom: 20px;
      font-weight: 600;
    }
    .welcome-text {
      font-size: 16px;
      line-height: 1.8;
      color: #475569;
      margin-bottom: 25px;
    }
    .info-box {
      background: linear-gradient(135deg, #f0f9ff 0%, #e0f2fe 100%);
      border-left: 4px solid #2563eb;
      border-radius: 10px;
      padding: 25px;
      margin: 30px 0;
      box-shadow: 0 4px 10px rgba(37, 99, 235, 0.08);
    }
    .info-box h3 {
      color: #1e40af;
      font-size: 16px;
      margin-bottom: 15px;
      display: flex;
      align-items: center;
      gap: 8px;
    }
    .info-box h3 svg {
      width: 20px;
      height: 20px;
      fill: #2563eb;
    }
    .credentials-row {
      display: flex;
      align-items: center;
      padding: 12px 0;
      border-bottom: 1px solid rgba(37, 99, 235, 0.1);
    }
    .credentials-row:last-child {
      border-bottom: none;
    }
    .credentials-label {
      font-weight: 600;
      color: #334155;
      min-width: 100px;
      font-size: 14px;
    }
    .credentials-value {
      font-family: 'Courier New', monospace;
      color: #1e293b;
      font-size: 15px;
      font-weight: 500;
      background-color: rgba(255, 255, 255, 0.7);
      padding: 6px 12px;
      border-radius: 6px;
      flex: 1;
    }
    .alert-box {
      background-color: #fef3c7;
      border-left: 4px solid #f59e0b;
      border-radius: 10px;
      padding: 18px;
      margin: 25px 0;
      display: flex;
      align-items: start;
      gap: 12px;
    }
    .alert-box svg {
      width: 24px;
      height: 24px;
      fill: #f59e0b;
      flex-shrink: 0;
      margin-top: 2px;
    }
    .alert-box p {
      color: #78350f;
      font-size: 14px;
      line-height: 1.6;
      margin: 0;
    }
    .button-container {
      text-align: center;
      margin: 35px 0;
    }
    a.button {
      display: inline-block;
      background: linear-gradient(135deg, #2563eb 0%, #1d4ed8 100%);
      color: #fff;
      text-decoration: none;
      padding: 16px 40px;
      border-radius: 10px;
      font-weight: 600;
      font-size: 16px;
      box-shadow: 0 6px 20px rgba(37, 99, 235, 0.4);
      transition: all 0.3s ease;
      letter-spacing: 0.3px;
    }
    a.button:hover {
      background: linear-gradient(135deg, #1d4ed8 0%, #1e40af 100%);
      box-shadow: 0 8px 25px rgba(37, 99, 235, 0.5);
      transform: translateY(-2px);
    }
    .link-fallback {
      background-color: #f8fafc;
      border-radius: 8px;
      padding: 15px;
      margin: 25px 0;
      text-align: center;
    }
    .link-fallback p {
      font-size: 13px;
      color: #64748b;
      margin-bottom: 8px;
    }
    .link-fallback a {
      color: #2563eb;
      word-break: break-all;
      font-size: 13px;
      text-decoration: none;
    }
    .link-fallback a:hover {
      text-decoration: underline;
    }
    .features {
      display: grid;
      grid-template-columns: 1fr 1fr;
      gap: 20px;
      margin: 30px 0;
    }
    .feature-card {
      background-color: #f8fafc;
      border-radius: 10px;
      padding: 20px;
      text-align: center;
      border: 1px solid #e2e8f0;
    }
    .feature-card svg {
      width: 35px;
      height: 35px;
      fill: #2563eb;
      margin-bottom: 12px;
    }
    .feature-card h4 {
      font-size: 14px;
      color: #334155;
      margin-bottom: 6px;
    }
    .feature-card p {
      font-size: 12px;
      color: #64748b;
      line-height: 1.5;
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
    .social-icons {
      margin-top: 20px;
      display: flex;
      justify-content: center;
      gap: 15px;
    }
    .social-icons a {
      width: 36px;
      height: 36px;
      background-color: #e2e8f0;
      border-radius: 50%;
      display: flex;
      align-items: center;
      justify-content: center;
      transition: all 0.3s ease;
    }
    .social-icons a:hover {
      background-color: #2563eb;
    }
    .social-icons svg {
      width: 18px;
      height: 18px;
      fill: #64748b;
    }
    .social-icons a:hover svg {
      fill: white;
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
      .features {
        grid-template-columns: 1fr;
      }
      .credentials-row {
        flex-direction: column;
        align-items: flex-start;
        gap: 8px;
      }
      .credentials-label {
        min-width: auto;
      }
      .credentials-value {
        width: 100%;
      }
    }
  </style>
</head>
<body>
  <div class="email-wrapper">
    <div class="email-container">
      
      <!-- Header Section -->
      <div class="header">
        <div class="logo-circle">
          <svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
            <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm-2 15l-5-5 1.41-1.41L10 14.17l7.59-7.59L19 8l-9 9z"/>
          </svg>
        </div>
        <h1>Welcome to NeuroFit Connections</h1>
        <p>Your journey to better health starts here</p>
      </div>

      <!-- Content Section -->
      <div class="content">
        <h2 class="greeting">Hello {{ $user->name }}!  </h2>
        
        <p class="welcome-text">
          We're thrilled to have you join NeuroFit Connections! Your account has been successfully created, 
          and you're now ready to begin your personalized intake process.
        </p>

        <!-- Credentials Box -->
        <div class="info-box">
          <h3>
            <svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
              <path d="M18 8h-1V6c0-2.76-2.24-5-5-5S7 3.24 7 6v2H6c-1.1 0-2 .9-2 2v10c0 1.1.9 2 2 2h12c1.1 0 2-.9 2-2V10c0-1.1-.9-2-2-2zm-6 9c-1.1 0-2-.9-2-2s.9-2 2-2 2 .9 2 2-.9 2-2 2zm3.1-9H8.9V6c0-1.71 1.39-3.1 3.1-3.1 1.71 0 3.1 1.39 3.1 3.1v2z"/>
            </svg>
            Your Login Credentials
          </h3>
          <div class="credentials-row">
            <span class="credentials-label">Email:</span>
            <span class="credentials-value">{{ $user->email }}</span>
          </div>
          <div class="credentials-row">
            <span class="credentials-label">Password:</span>
            <span class="credentials-value">{{ $password }}</span>
          </div>
        </div>

        <!-- Security Alert -->
        <div class="alert-box">
          <svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
            <path d="M1 21h22L12 2 1 21zm12-3h-2v-2h2v2zm0-4h-2v-4h2v4z"/>
          </svg>
          <p>
            <strong>Important:</strong> Please change your password after your first login for security purposes. 
            Keep your credentials safe and never share them with anyone.
          </p>
        </div>

        <!-- Features Grid -->
        <div class="features">
          <div class="feature-card">
            <svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
              <path d="M9 16.17L4.83 12l-1.42 1.41L9 19 21 7l-1.41-1.41z"/>
            </svg>
            <h4>Easy Process</h4>
            <p>Simple step-by-step form completion</p>
          </div>
          <div class="feature-card">
            <svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
              <path d="M12 1L3 5v6c0 5.55 3.84 10.74 9 12 5.16-1.26 9-6.45 9-12V5l-9-4z"/>
            </svg>
            <h4>Secure & Private</h4>
            <p>Your data is encrypted and protected</p>
          </div>
          <div class="feature-card">
            <svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
              <path d="M11.99 2C6.47 2 2 6.48 2 12s4.47 10 9.99 10C17.52 22 22 17.52 22 12S17.52 2 11.99 2zM12 20c-4.42 0-8-3.58-8-8s3.58-8 8-8 8 3.58 8 8-3.58 8-8 8zm.5-13H11v6l5.25 3.15.75-1.23-4.5-2.67z"/>
            </svg>
            <h4>Save Progress</h4>
            <p>Continue anytime from where you left</p>
          </div>
          <div class="feature-card">
            <svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
              <path d="M20 4H4c-1.1 0-1.99.9-1.99 2L2 18c0 1.1.9 2 2 2h16c1.1 0 2-.9 2-2V6c0-1.1-.9-2-2-2zm0 4l-8 5-8-5V6l8 5 8-5v2z"/>
            </svg>
            <h4>Email Support</h4>
            <p>Get help whenever you need it</p>
          </div>
        </div>

        <div class="divider"></div>

        <!-- CTA Button -->
        <div class="button-container">
          <a href="{{ $formLink }}" class="button">
             Start Your Intake Form
          </a>
        </div>

        <!-- Link Fallback -->
        <div class="link-fallback">
          <p>If the button above doesn't work, copy and paste this link:</p>
          <a href="{{ $formLink }}">{{ $formLink }}</a>
        </div>

        <!-- Signature -->
        <div class="signature">
          <p>
            We're here to support you every step of the way. If you have any questions or need assistance, 
            don't hesitate to reach out to our team.
          </p>
          <strong>
            Best regards,<br>
            The NeuroFit Connections Team
          </strong>
        </div>
      </div>

      <!-- Footer Section -->
      <div class="footer">
        <div class="footer-links">
          <a href="#">Help Center</a>
          <a href="#">Privacy Policy</a>
          <a href="#">Terms of Service</a>
        </div>
        
        <div class="social-icons">
          <a href="#" aria-label="Facebook">
            <svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
              <path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/>
            </svg>
          </a>
          <a href="#" aria-label="Twitter">
            <svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
              <path d="M23.953 4.57a10 10 0 01-2.825.775 4.958 4.958 0 002.163-2.723c-.951.555-2.005.959-3.127 1.184a4.92 4.92 0 00-8.384 4.482C7.69 8.095 4.067 6.13 1.64 3.162a4.822 4.822 0 00-.666 2.475c0 1.71.87 3.213 2.188 4.096a4.904 4.904 0 01-2.228-.616v.06a4.923 4.923 0 003.946 4.827 4.996 4.996 0 01-2.212.085 4.936 4.936 0 004.604 3.417 9.867 9.867 0 01-6.102 2.105c-.39 0-.779-.023-1.17-.067a13.995 13.995 0 007.557 2.209c9.053 0 13.998-7.496 13.998-13.985 0-.21 0-.42-.015-.63A9.935 9.935 0 0024 4.59z"/>
            </svg>
          </a>
          <a href="#" aria-label="LinkedIn">
            <svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
              <path d="M20.447 20.452h-3.554v-5.569c0-1.328-.027-3.037-1.852-3.037-1.853 0-2.136 1.445-2.136 2.939v5.667H9.351V9h3.414v1.561h.046c.477-.9 1.637-1.85 3.37-1.85 3.601 0 4.267 2.37 4.267 5.455v6.286zM5.337 7.433c-1.144 0-2.063-.926-2.063-2.065 0-1.138.92-2.063 2.063-2.063 1.14 0 2.064.925 2.064 2.063 0 1.139-.925 2.065-2.064 2.065zm1.782 13.019H3.555V9h3.564v11.452zM22.225 0H1.771C.792 0 0 .774 0 1.729v20.542C0 23.227.792 24 1.771 24h20.451C23.2 24 24 23.227 24 22.271V1.729C24 .774 23.2 0 22.222 0h.003z"/>
            </svg>
          </a>
        </div>

        <p style="margin-top: 20px;">
          <strong>© {{ date('Y') }} NeuroFit Connections.</strong> All rights reserved.
        </p>
        <p>
          This email was sent to {{ $user->email }}<br>
          You're receiving this because you registered for NeuroFit Connections.
        </p>
      </div>

    </div>
  </div>
</body>
</html>