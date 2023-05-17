CREATE TABLE tx_powermail_domain_model_field
(
    `autocomplete_token`   varchar(20)  DEFAULT '' NOT NULL,
    `autocomplete_section` varchar(100) DEFAULT '' NOT NULL,
    `autocomplete_type`    varchar(8)   DEFAULT '' NOT NULL,
    `autocomplete_purpose` varchar(8)   DEFAULT '' NOT NULL
);

CREATE TABLE tx_powermail_domain_model_form
(
    `autocomplete_token` varchar(3) DEFAULT '' NOT NULL
);