 Dolibarr Custom Edition

نسخة مخصصة من نظام Dolibarr ERP/CRM معدة للتطوير والتخصيص، تعمل عبر بيئة Docker متكاملة مع MariaDB.

 المميزات
- تشغيل Dolibarr في بيئة معزولة باستخدام Docker
- قاعدة بيانات MariaDB مهيأة مسبقًا
- دعم بيئات تطوير (`dev`)، اختبار (`staging`)، وإنتاج (`prod`)
- إمكانية إضافة وحدات مخصصة بسهولة

---

 📂 هيكل المشروع
 ├── dolibarr-dev/ # كود Dolibarr الأساسي
│ └── htdocs/ # ملفات PHP والواجهات
├── data/ # بيانات قاعدة البيانات (مستبعدة من Git)
├── seed/ # سكربتات SQL لتهيئة البيانات
├── docker-compose.yml # ملف تعريف الخدمات
├── Makefile # أوامر مختصرة للتشغيل
├── .env # إعدادات البيئة
└── README.md

---

## 🚀 التشغيل المحلي

### 1️⃣ نسخ ملف البيئة
```bash
cp .env.example .env

ثم قم بتعديل القيم حسب حاجتك (مثل كلمة مرور قاعدة البيانات واسمها).
docker-compose up -d
http://localhost:8080

make up         # تشغيل الخدمات
make down       # إيقاف الخدمات
make seed-dev   # تهيئة قاعدة بيانات التطوير
make logs       # عرض السجلات

 قاعدة البيانات
لإضافة بيانات أولية:

 نسخة Docker خاصة

 docker build -t your-dockerhub-username/dolibarr-custom:latest .
docker push your-dockerhub-username/dolibarr-custom:latest

 الترخيص
 هذا المشروع يعتمد على Dolibarr ERP/CRM والمحتوى المخصص مملوك للمطور.

---

أنا أنصح إننا نرفع الاتنين دول (`.gitignore` و `README.md`) الأول،  
وبعدها نعمل **commit** و **push** نظيف للمشروع.  

تحب أضيف كمان **`.env.example`** جاهز بقيم افتراضية عشان أي حد يقدر يشتغل بالمشروع مباشرة؟ ده هيسهّل الشغل لو هنشارك الكود مع فريق.

