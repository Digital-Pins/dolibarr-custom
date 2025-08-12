-- User Admin
INSERT INTO llx_user (login, pass_crypted, lastname, firstname, admin, entity)
VALUES ('admin', MD5('stagepass'), 'Admin', 'Staging', 1, 1);

-- Example Customer
INSERT INTO llx_societe (nom, client, fournisseur)
VALUES ('Test Customer Staging', 1, 0);

-- Example Product
INSERT INTO llx_product (ref, label, price, fk_product_type)
VALUES ('PSTAGE001', 'Staging Test Product', 150, 0);

-- Example Invoice
INSERT INTO llx_facture (facnumber, fk_soc, total_ht, total_ttc, datec, entity)
VALUES ('STAGE-INV-001', 1, 150, 180, NOW(), 1);
