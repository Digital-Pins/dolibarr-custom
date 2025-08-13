# Digital PIN – Dolibarr Custom Edition

**Digital PIN** is a leading digital project management company specializing in developing and customizing ERP/CRM solutions for local businesses. This repository represents our tailored version of Dolibarr ERP/CRM, optimized for seamless development, deployment, and scalability using Docker and MariaDB.

---

## 🚀 Why Digital PIN?

Digital PIN empowers organizations to manage projects, products, and teams efficiently through innovative digital solutions. Our custom Dolibarr edition is designed to accelerate your business growth, streamline operations, and provide full control over your data and workflows.

---

## 🌟 Key Features

- **Isolated Docker Environment:** Run Dolibarr securely and efficiently in a containerized setup.
- **Pre-configured MariaDB Database:** Hassle-free database management for development and production.
- **Multi-Environment Support:** Easily switch between development (`dev`), staging (`staging`), and production (`prod`) environments.
- **Custom Module Integration:** Effortlessly add and manage bespoke modules tailored to your business needs.
- **Scalable & Maintainable:** Built for local businesses aiming for digital transformation and operational excellence.

---

## 📂 Project Structure

```
├── dolibarr-dev/           # Core Dolibarr source code
│   └── htdocs/             # PHP files and web interfaces
├── data/                   # Database data (excluded from Git)
├── seed/                   # SQL scripts for initial data setup
├── docker-compose.yml      # Service definitions
├── Makefile                # Shortcut commands for management
├── .env                    # Environment configuration
└── README.md
```

---

## 🏁 Getting Started Locally

### 1️⃣ Copy and Configure Environment File

```bash
cp .env.example .env
```
Edit the `.env` file to set your database credentials and other settings.

### 2️⃣ Launch Services

```bash
docker-compose up -d
```
Access Dolibarr at: [http://localhost:8080](http://localhost:8080)

### 3️⃣ Useful Make Commands

- `make up`         – Start all services
- `make down`       – Stop all services
- `make seed-dev`   – Initialize development database
- `make logs`       – View service logs

---

## 🗄️ Database Initialization

To seed your development database with initial data, run:
```bash
make seed-dev
```

---

## 🏢 About Digital PIN

Digital PIN is committed to driving digital transformation for local businesses. Our expertise in ERP/CRM customization ensures that your organization gets a solution perfectly aligned with its goals.

---

## 🏷️ License

This project is based on Dolibarr ERP/CRM. All custom content is owned by Digital PIN.

---

---

# Digital PIN – إصدار دوليبار المخصص

**ديجيتال بين** هي شركة رائدة في إدارة المشروعات الرقمية، متخصصة في تطوير وتخصيص حلول ERP/CRM للشركات المحلية. هذا المستودع يمثل نسختنا المخصصة من نظام Dolibarr، والمهيأة بالكامل للعمل بكفاءة وسهولة عبر Docker وMariaDB.

---

## 🚀 لماذا ديجيتال بين؟

ديجيتال بين تساعد المؤسسات على إدارة المشروعات والمنتجات والفرق بكفاءة من خلال حلول رقمية مبتكرة. إصدارنا المخصص من Dolibarr مصمم لتسريع نمو أعمالك، وتبسيط العمليات، ومنحك تحكم كامل في بياناتك وتدفقات العمل.

---

## 🌟 المميزات الرئيسية

- **بيئة Docker معزولة:** تشغيل Dolibarr بأمان وكفاءة في بيئة حاويات.
- **قاعدة بيانات MariaDB مهيأة مسبقًا:** إدارة قواعد البيانات بسهولة في التطوير والإنتاج.
- **دعم تعدد البيئات:** التبديل السهل بين بيئة التطوير (`dev`) والاختبار (`staging`) والإنتاج (`prod`).
- **إضافة وحدات مخصصة:** إدارة وإضافة وحدات خاصة تلبي احتياجات أعمالك.
- **قابلية التوسع والصيانة:** مصمم للشركات المحلية الطامحة للتحول الرقمي والتميز التشغيلي.

---

## 📂 هيكل المشروع

```
├── dolibarr-dev/           # كود Dolibarr الأساسي
│   └── htdocs/             # ملفات PHP والواجهات
├── data/                   # بيانات قاعدة البيانات (مستبعدة من Git)
├── seed/                   # سكربتات SQL لتهيئة البيانات
├── docker-compose.yml      # تعريف الخدمات
├── Makefile                # أوامر مختصرة للإدارة
├── .env                    # إعدادات البيئة
└── README.md
```

---

## 🏁 التشغيل المحلي

### 1️⃣ نسخ وضبط ملف البيئة

```bash
cp .env.example .env
```
قم بتعديل ملف `.env` لإدخال بيانات قاعدة البيانات والإعدادات الأخرى.

### 2️⃣ تشغيل الخدمات

```bash
docker-compose up -d
```
الوصول إلى Dolibarr عبر: [http://localhost:8080](http://localhost:8080)

### 3️⃣ أوامر Make المفيدة

- `make up`         – تشغيل جميع الخدمات
- `make down`       – إيقاف جميع الخدمات
- `make seed-dev`   – تهيئة قاعدة بيانات التطوير
- `make logs`       – عرض سجلات الخدمات

---

## 🗄️ تهيئة قاعدة البيانات

لإضافة بيانات أولية لقاعدة بيانات التطوير:
```bash
make seed-dev
```

---

## 🏢 عن ديجيتال بين

ديجيتال بين ملتزمة بدفع التحول الرقمي للشركات المحلية. خبرتنا في تخصيص أنظمة ERP/CRM تضمن حصول مؤسستك على حل يتوافق تمامًا مع أهدافها.

---

## 🏷️ الترخيص

هذا المشروع يعتمد على Dolibarr ERP/CRM. جميع المحتوى المخصص مملوك لشركة Digital PIN.

