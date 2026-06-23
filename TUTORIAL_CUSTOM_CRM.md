# Tutorial: Integrating HubSpot/GHL with CloseClient Elite

This guide shows you how to use our "Custom Form Action" feature to bypass Contact Form 7 and pipe leads directly into your CRM while keeping our premium styles.

## Step 1: Get your Form Action URL
### HubSpot:
1.  Go to **Marketing > Forms**.
2.  Create or Edit a form.
3.  Click **Share** and look for the "POST URL" or use their API endpoint.

### GoHighLevel (GHL):
1.  Go to **Sites > Forms > Builder**.
2.  Create your form.
3.  Navigate to **Settings** and look for the form submission endpoint.

## Step 2: Configure CloseClient
1.  Navigate to **Appearance > Customize**.
2.  Open **1. Elite Brand Identity > CRM & Form Actions**.
3.  Paste your URL into the relevant field (e.g., **Contact Form Action URL**).

## Step 3: Map Your Fields
Ensure your CRM form fields use these names for automatic mapping:
*   `name` or `first_name`
*   `email`
*   `message`

## Step 4: Verify
1.  Open your Contact page.
2.  Submit a test entry.
3.  Confirm the lead appears in your CRM dashboard.

---
*Note: Our system will automatically style the inputs and buttons to match your brand colors.*
