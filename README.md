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


