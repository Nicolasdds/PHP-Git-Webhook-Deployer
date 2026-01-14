# PHP-Git-Webhook-Deployer
Lightweight PHP webhook-based Git deployer with multi-client support and automatic repo initialization.

PHP Webhook Git Deployer is a lightweight, self-hosted deployment tool that automatically deploys GitHub repositories using webhooks.
It supports multiple clients, multiple environments (dev/production), automatic repository initialization, and secure token-based endpoints — all without external dependencies or complex CI/CD setups.

Features:
🚀 Automatic deployment via webhook URL
🔐 Token-based endpoint security
👥 Multi-client and multi-environment support
📁 Auto-create directories

🧠 Smart behavior:
Clone repository if directory is empty
Initialize Git if files exist but no repo
Pull changes if repository already exists
⚙️ Pure PHP (no frameworks required)
🧩 Easy configuration file for adding new projects
🖥️ Perfect for shared hosting, VPS, and lightweight servers
This project is ideal for developers who want a simple alternative to complex CI/CD pipelines.


📦 How to use this app

This application works as a self-hosted webhook endpoint.
You expose it through a domain or subdomain and GitHub calls it automatically on every push.

Example app URL:

https://webhooks.yourdomain.com/YOUR_SECRET_TOKEN

⚙️ What needs to be configured

To use this deployer, you only need to configure three things:

A domain or subdomain pointing to the folder where this project is hosted
(e.g. webhooks.yourdomain.com → /home/user/webhooks/)

SSH access to GitHub without passphrase
The server user running PHP must be able to execute:

git pull


without asking for passwords or passphrases.

A GitHub webhook for each environment
In your repository:

Settings → Webhooks → Add webhook

With the Payload URL set to: https://webhooks.yourdomain.com/YOUR_SECRET_TOKEN
