CREATE TABLE username(
  id BIGINT Primary key ,
  roleId SMALLINT NOT NULL,
  firstName VARCHAR(50) NULL DEFAULT NULL,
  lastName VARCHAR(50) NULL DEFAULT NULL,
  username VARCHAR(50) NULL DEFAULT NULL,
  mobile VARCHAR(30) NULL,
  email VARCHAR(40) NULL,
  password VARCHAR(40) NOT NULL,
  registeredAt DATE NOT NULL,
  lastLogin TIME NULL DEFAULT NULL
  );
  INSERT INTO (id,roleId,firstName,lastName,username,email,password,RegisteredAt,lastLogin) Values(1,'AP9','Archaana','Sindu','Archana789','archanasindu2001@gmail.com','Sindu789@',09-10-22,11:30AM);
  INSERT INTO (id,roleId,firstName,lastName,username,email,password,RegisteredAt,lastLogin) Values(2,'TL9','Ravi','Sabbi','Ravi987','Ravi2001@gmail.com','Ravi789@','10-10-22','12:30AM');
  INSERT INTO (id,roleId,firstName,lastName,username,email,password,RegisteredAt,lastLogin) Values(3,'M9','Shivani','Chapala','Shivanichapala','shivani2001@gmail.com','Shivani789@','11-10-22','1:30AM');
   ALTER TABLE
        TaskMetaTable ADD PRIMARY KEY(Iid);
  CREATE TABLE Task(
  id INT Primary key,
  userId INT ,
  createdBy INT ,
  updatedBy INT ,
  title VARCHAR(50) NULL DEFAULT NULL ,
  description VARCHAR(50) NULL DEFAULT NULL ,
  status INT ,
  hours TIME  ,
  createdAt DATE NOT NULL ,
  updatedAt DATE NOT NULL ,
  plannedStartDate DATE NOT NULL ,
  plannedEndDate DATE NOT NULL ,
  actualStartDate DATE NOT NULL  ,
  actualEndDate DATE NOT NULL ,
   );
INSERT INTO(id,userId,createdBy,UpdatedBy,title,description,Status,hours,CreatedAt,updatedAt,plannedStartDate,plannedEndDate) values(10,'AP9','Shiva','varma','Thought Life','Being Happy is self responsibility',4-1-22,10-10-22);
INSERT INTO(id,userId,createdBy,UpdatedBy,title,description,Status,hours,CreatedAt,updatedAt,plannedStartDate,plannedEndDate) values(12,'TL9','Nandu','Kumar','Normal Life','Being Happy is self responsibility',14-10-23,12-11-21);
INSERT INTO(id,userId,createdBy,UpdatedBy,title,description,Status,hours,CreatedAt,updatedAt,plannedStartDate,plannedEndDate) values(10,'M9','Tejaa','kumar','Peaceful Life','Being Happy is self responsibility',24-10-23,11-09-20);
 ALTER TABLE
    Tag Table ADD PRIMARY KEY(Id);
 CREATE TABLE TaskmetaTable(
id INT Primary key,
  key VARCHAR(40) NULL DEFAULT NULL,
  CONTENT VARCHAR(50) NULL DEFAULT NULL ,
);
INSERT INTO(key,content,Taskid) values('among''Various things being happened''40');
INSERT INTO(key,content,Taskid) values('things''Various things being happened''10');
INSERT INTO(key,content,Taskid) values('better''Various things being happened''20');
ALTER TABLE
    Activity Table ADD PRIMARY KEY(Id);
CREATE TABLE TagTables(
  id int Primary key,
  Title varchar (90)NULL DEFAULT NULL,
  slug int
  );
  INSERT INTO (id,Title,slug) values('80','Archana','590')
  INSERT INTO (id,Title,slug) values('20','Sindu','290')
  INSERT INTO (id,Title,slug) values('190','Raj','690')
  ALTER TABLE
    Task Tag Table ADD PRIMARY KEY(Id);
  CREATE TABLE Tasktagtable(
  Taskid int,
  Tagid int
  );
  ALTER TABLE
    Comment ADD PRIMARY KEY("id");
  CREATE TABLE Activity(
  id INT Primary key,
  userId INT ,
  TaskId INT,
  createdBy INT ,
  updatedBy INT ,
  title VARCHAR(50) NULL DEFAULT NULL ,
  description VARCHAR(50)NULL DEFAULT NULL ,
  status INT ,
  hours TIME NOT NULL ,
  createdAt DATE  NOT NULL,
  updatedAt DATE  NOT NULL ,
  plannedStartDate DATE   NOT NULL,
  plannedEndDate DATE  NOT NULL,
  actualStartDate DATE  NOT NULL ,
  actualEndDate DATE  NOT NULL,
  CONTENT VARCHAR(50)NULL DEFAULT NULL
   );
   INSERT INTO(id,userId,TaskId,createdBy,UpdatedBy,title,description,Status,hours,CreatedAt,updatedAt,plannedStartDate,plannedEndDate) values(10,'AP9','Shiva','varma','Thought Life','Being Happy is self responsibility',4-1-22,10-10-22);
   INSERT INTO(id,userId,createdBy,UpdatedBy,title,description,Status,hours,CreatedAt,updatedAt,plannedStartDate,plannedEndDate) values(12,'TL9','Nandu','Kumar','Normal Life','Being Happy is self responsibility',14-10-23,12-11-21);
   INSERT INTO(id,userId,createdBy,UpdatedBy,title,description,Status,hours,CreatedAt,updatedAt,plannedStartDate,plannedEndDate) values(10,'M9','Tejaa','kumar','Peaceful Life','Being Happy is self responsibility',24-10-23,11-09-20);
CREATE TABLE Comment(
  id int primary key,
  TaskId int,
  Activityid int,
  Title VARCHAR(90)NULL DEFAULT NULL,
 CreatedAt DATE NOT NULL,
  UpdatedAt DATE NOT NULL,
  CONTENT VARCHAR(50)NULL DEFAULT NULL,
  INSERT INTO (id,TaskId,Activityid,TItle,CreatedAt,UpdatedAt,Content,)values(90,L9,A56,19-11-22,9-11-22,'living' )
  INSERT INTO (id,TaskId,Activityid,TItle,CreatedAt,UpdatedAt,Content,)values(80,L7,A50,20-11-21,10-11-22,'living' )
  INSERT INTO (id,TaskId,Activityid,TItle,CreatedAt,UpdatedAt,Content,)values(80,L7,A98,19-11-20,19-10-21,'living' )
  );
  ALTER TABLE
    Username ADD PRIMARY KEY(Role Id);
ALTER TABLE
    Task Tag Table ADD CONSTRAINT task tag table_task id_foreign FOREIGN KEY(Task Id) REFERENCES Task(Id);
ALTER TABLE
    Comment ADD CONSTRAINT comment_activity id_foreign FOREIGN KEY(Activity Id) REFERENCES Activity Table(Id);
ALTER TABLE
    Task Tag Table ADD CONSTRAINT task tag table_task id_foreign FOREIGN KEY(Task Id) REFERENCES Tag Table(Id);
ALTER TABLE
    Task Meta Table ADD CONSTRAINT task meta table_task id_foreign FOREIGN KEY(Task Id) REFERENCES Task(Id );
ALTER TABLE
    Activity Table ADD CONSTRAINT activity table_task id_foreign FOREIGN KEY(Task Id) REFERENCES Task(Id);
ALTER TABLE
    Comment  ADD CONSTRAINT comment_task id_foreign FOREIGN KEY(Task Id) REFERENCES Task(Id);
ALTER TABLE
    Task ADD CONSTRAINT task_updated by_foreign FOREIGN KEY(UpdatedBy) REFERENCES Username(Role Id);
ALTER TABLE
    Task ADD CONSTRAINT task_created by_foreign FOREIGN KEY(CreatedBy) REFERENCES Username(Role Id);
ALTER TABLE
    Activity Table ADD CONSTRAINT activity table_created by_foreign FOREIGN KEY(CreatedBy) REFERENCES Username(Role ID);
ALTER TABLE
    Activity Table ADD CONSTRAINT activity table_updated by_foreign FOREIGN KEY(UpdatedBy) REFERENCES Username(Role ID);
  
  