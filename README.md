# 🏆 Loyalty Reward App — Laravel + Livewire + Tailwind

This is a full-featured Laravel application designed to manage a **customer loyalty system**. The system allows users to create invoices that generate QR codes, which customers can scan to accumulate reward points.

Built using modern web development tools — Laravel, Livewire, Alpine.js, and Tailwind CSS — this app is designed with scalability, usability, and modularity in mind.

---

## 📌 Features

- User authentication and registration (via Laravel Breeze)
- Invoice creation with auto-generated invoice numbers
- QR code generation using `simple-qrcode`
- Invoice listing and filtering by amount or invoice number
- Dynamic Alpine.js-powered search (real-time filtering)
- Livewire modal-based invoice preview
- Invoice printing support
- Tailwind CSS for responsive styling
- Vite for asset bundling and fast development

---

## 🏗️ Technologies Used

| Area             | Stack                         |
|------------------|-------------------------------|
| Backend          | Laravel 10.x                  |
| Frontend         | Tailwind CSS, Alpine.js       |
| Dynamic UI       | Livewire v3                   |
| Authentication   | Laravel Breeze                |
| QR Code Engine   | Simple QrCode (`bacon/bacon-qr-code`) |
| Asset Build Tool | Vite                          |

---

## 🚀 Getting Started

### 1. Clone the project

```bash
git clone https://github.com/AhmadShamouka/loyality-reward-app
cd loyalty-app
