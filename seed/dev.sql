-- User Admin (ignore if already created by installer)
INSERT IGNORE INTO llx_user (login, pass_crypted, lastname, firstname, admin, entity)
VALUES ('admin', MD5('admin'), 'Admin', 'Dev', 1, 1);

-- Example Customer
INSERT IGNORE INTO llx_societe (nom, client, fournisseur)
VALUES ('Test Customer Dev', 1, 0);

-- Example Product
INSERT IGNORE INTO llx_product (ref, label, price, fk_product_type)
VALUES ('PDEV001', 'Dev Test Product', 100, 0);

-- Example Invoice
-- Example Invoice (use `ref` column name in current schema)
INSERT IGNORE INTO llx_facture (`ref`, fk_soc, total_ht, total_ttc, datec, entity)
VALUES ('DEV-INV-001', 1, 100, 120, NOW(), 1);
