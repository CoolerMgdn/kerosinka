create table USER_REGISTER
(
    ID           INT KEY AUTO_INCREMENT,
    PASSWORD     VARCHAR(4000),
    EMAIL        VARCHAR(100),
    USER_ID      INT,
    CASE_NUMBER  INT(1),
    ATTEND_COUNT INT(1),
    ATTEND_DATA  DATE
);

create table USER_INFO
(
    USER_ID                      INT(38) KEY AUTO_INCREMENT,
    LASTNAME                     VARCHAR(4000),
    FIRSTNAME                    VARCHAR(4000),
    PATRONYMIC                   VARCHAR(4000),
    SEX                          VARCHAR(2),
    BIRTHDATE                    DATE,
    CLASS_NUMBER		 INT DEFAULT NULL,
    REGION_ID			 INT(3),
    EDU_CITY			 VARCHAR(4000) DEFAULT NULL,
    EDU_ADDRESS			 VARCHAR(4000) DEFAULT NULL,
    EDU_NAME			 VARCHAR(4000) DEFAULT NULL,
    PHONE                        VARCHAR(4000) DEFAULT NULL,
    POST_INDEX			 INT(6),
    CITY			 VARCHAR(4000),
    STREET			 VARCHAR(4000),
    HOUSE			 INT(4),
    APARTMENT			 INT(5) DEFAULT NULL,
    REG_ID                       INT,
    UPDATE_DATE                  TIMESTAMP DEFAULT NOW()
);

alter table USER_INFO add constraint foreign key (REG_ID) references USER_REGISTER(ID);
