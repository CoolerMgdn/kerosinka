create table USER_REGISTER
(
    ID           INT KEY AUTO_INCREMENT,
    PASSWORD     VARCHAR(400),
    EMAIL        VARCHAR(100),
    USER_ID      INT,
    CASE_NUMBER  INT(1),
    ATTEND_COUNT INT(1),
    ATTEND_DATA  DATE
);

create table USER_INFO
(
    USER_ID                      INT(38) KEY AUTO_INCREMENT,
    LASTNAME                     VARCHAR(400),
    FIRSTNAME                    VARCHAR(400),
    PATRONYMIC                   VARCHAR(400),
    SEX                          VARCHAR(2),
    BIRTHDATE                    DATE,
    CLASS_NUMBER		 INT DEFAULT NULL,
    REGION_ID			 INT(3),
    EDU_CITY			 VARCHAR(400) DEFAULT NULL,
    EDU_ADDRESS			 VARCHAR(400) DEFAULT NULL,
    EDU_NAME			 VARCHAR(400) DEFAULT NULL,
    PHONE                        VARCHAR(400) DEFAULT NULL,
    POST_INDEX			 INT(6),
    CITY			 VARCHAR(400),
    STREET			 VARCHAR(400),
    HOUSE			 INT(4),
    APARTMENT			 INT(5) DEFAULT NULL,
    REG_ID                       INT,
    UPDATE_DATE                  TIMESTAMP DEFAULT NOW()
);

create table USER_TESTS
(
    USER_ID         INT KEY,
    TASK_1          INT(10),
    TASK_2          INT(10),
    TASK_3          INT(10),
    TASK_4          INT(10),
    TASK_5          INT(10),
    TASK_6          INT(10),
    TASK_7          INT(10),
    TASK_8          INT(10),
    TASK_9          INT(10),
    TASK_10         INT(10),
    TASK_11         INT(10),
    TASK_12         INT(10),
    TASK_13         INT(10),
    TASK_14         INT(10),
    TASK_15         INT(10),
    TASK_16         VARCHAR(400),
    TASK_17         VARCHAR(400),
    TASK_18         VARCHAR(400),
    TASK_19         VARCHAR(400),
    TASK_20         VARCHAR(400),
    TASK_21         VARCHAR(400),
    TASK_22         VARCHAR(400),
    UPDATE_DATE     TIMESTAMP DEFAULT NOW()
);

alter table USER_INFO add constraint foreign key (REG_ID) references USER_REGISTER(ID);

ALTER TABLE USER_INFO CONVERT TO CHARACTER SET utf8;
