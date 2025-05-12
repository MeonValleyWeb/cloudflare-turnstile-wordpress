# Cloudflare Turnstile Validation for WordPress (Breakdance Compatible)

[![License: MIT](https://img.shields.io/badge/License-MIT-green.svg)](LICENSE)
[![WordPress Compatible](https://img.shields.io/badge/WordPress-6.x-blue.svg)](https://wordpress.org)
[![Cloudflare Turnstile](https://img.shields.io/badge/Cloudflare-Turnstile-orange.svg)](https://developers.cloudflare.com/turnstile/)

A lightweight WordPress plugin to validate Cloudflare Turnstile CAPTCHA responses. Ideal for Breakdance forms or any custom HTML form.

---

## 📌 Features

- ✅ Validates `cf-turnstile-response` on form submission
- ✅ Blocks form processing if Turnstile fails
- ✅ Reads Turnstile secret key from `.env` (Bedrock-compatible)
- ✅ Plugin-based (no theme edits needed)
- ✅ Works with any form builder (Breakdance, custom, etc.)

---

## ⚙️ Requirements

- WordPress (Bedrock or standard)
- PHP 7.4+
- Cloudflare Turnstile Site & Secret Keys
- Optional: Breakdance Builder

---

## 🚀 Installation

1. Clone or download into `wp-content/plugins/turnstile-validation`

2. Add the secret key to your `.env` file:
   ```env
   CLOUDFLARE_TURNSTILE_SECRET=your_secret_key_here
   ```

3. Expose it in `config/application.php`:
   ```php
   Config::define('CLOUDFLARE_TURNSTILE_SECRET', env('CLOUDFLARE_TURNSTILE_SECRET'));
   ```

4. Activate the plugin in your WordPress admin.

---

## 🧪 Usage

In your form (e.g., Breakdance HTML block), add:

```html
<script src="https://challenges.cloudflare.com/turnstile/v0/api.js" async defer></script>
<div class="cf-turnstile" data-sitekey="your_site_key_here"></div>
```

Make sure your form:

- Uses the `POST` method
- Includes the hidden field `cf-turnstile-response`
- Submits to a page that runs before `wp_loaded` (usually handled by this plugin)

---

## 📸 Screenshot

Example Turnstile widget in a Breakdance form:

![Cloudflare Turnstile in Breakdance Form](https://raw.githubusercontent.com/MeonValleyWeb/cloudflare-turnstile-wordpress/main/Screenshot.jpg)

---

## 📝 License

This plugin is open-sourced under the [MIT License](LICENSE).
