|||
| :- | :- |
||8/14/2020 ![](Aspose.Words.fd331182-6d8a-4a47-8ef3-6fdcdca9bb87.001.png)|
|||
Data Base Project 

LMS Admin Panel 

Submitted To: Mam Arifa Awan 

Name:                                 Zia Ur Rehman

ROLL NO:1802034 

Table of Contents 

[Database Schema: ......................................................................................................................................... 2 ](#_page2_x69.00_y72.00)[Entity Relationship Diagram: ........................................................................................................................ 2 ](#_page2_x69.00_y344.00)[Login Page: .................................................................................................................................................... 3 ](#_page3_x69.00_y72.00)[Navigation Bar: .............................................................................................................................................. 5 ](#_page5_x69.00_y72.00)[Explanation: .......................................................................................................................................... 5 ](#_page5_x69.00_y177.00)

[Log out method: ........................................................................................................................................ 6 ](#_page6_x69.00_y72.00)[Students Page: .............................................................................................................................................. 6 ](#_page6_x69.00_y404.00)[Explanation: .......................................................................................................................................... 7 ](#_page7_x69.00_y72.00)[Navigation: ................................................................................................................................................ 7 ](#_page7_x69.00_y211.00)[Teachers Page: .............................................................................................................................................. 7 ](#_page7_x69.00_y376.00)[Explanation: .......................................................................................................................................... 7 ](#_page7_x69.00_y671.00)[Courses Page: ................................................................................................................................................ 8 ](#_page8_x69.00_y309.00)

[Explanation: .......................................................................................................................................... 8 ](#_page8_x69.00_y591.00)[Departments Page: ....................................................................................................................................... 9 ](#_page9_x69.00_y132.00)[Explanation: .......................................................................................................................................... 9 ](#_page9_x69.00_y438.00)[Enrollments Page: ....................................................................................................................................... 10 ](#_page10_x69.00_y132.00)[Explanation: ........................................................................................................................................ 10 ](#_page10_x69.00_y460.00)[Functionality of All Pages: ........................................................................................................................... 11 ](#_page11_x69.00_y143.00)[ADD: ........................................................................................................................................................ 11 ](#_page11_x69.00_y246.00)[Edit: ......................................................................................................................................................... 12 ](#_page12_x69.00_y250.00)[Delete: ..................................................................................................................................................... 13 ](#_page13_x69.00_y72.00)[Errors: .......................................................................................................................................................... 14 ](#_page14_x69.00_y72.00)[Languages and there use: ........................................................................................................................... 15 ](#_page15_x69.00_y490.00)[Php: ......................................................................................................................................................... 15 ](#_page15_x69.00_y563.00)[HTML5: .................................................................................................................................................... 16 ](#_page16_x69.00_y122.00)[CSS/BootStrap4: ...................................................................................................................................... 16 ](#_page16_x69.00_y255.00)[JavaScript/AJAX: ...................................................................................................................................... 16 ](#_page16_x69.00_y411.00)

Database Schema: 

![](images\dbschema.png)

Entity Relationship Diagram: 

![](images\db.png)

Login Page: 

Login page is getting data from Table (admin). Given Input is compared with username and password column of admin. If the given username and password is correct it redirect’s to Students page. Which I am using as a home page. 

Front End 

![](images\login.png)But If the Password Is Wrong It Display the **Error** There is no navigation on this page 

![](images\auth.jpeg)

You cannot access directly to any page by using URL, you must have to Login First in order to gain access to any page. 

Navigation Bar: 

Front End 

![](images\nav.png)

Explanation:This is the navigation bar. It is fully responsive and active. All the page links are provided at the top.  

On the Right Corner the username of the admin is passed in Session variable. As it is full responsive its changes its shape according to the size of page. As soon we move the page to small size navigation bar collapse. 

![](images\navcollapse.png)

As we click on the right toggle menu. Its shows the page links. 

It is present on the top of every page and from here you can navigate to any page 

![](images\navopen.png)

Log out method: 

By clicking on the name of admin, which is shown on the right top corner of page in navigation bar. A pop up modal appears in order to log out. You must have to log out in order to login again due to redirect URL check. By clicking on the name following action occurs. 

![](images\logout.png)

Students Page: 

Front End

![](images\dash.jpeg)Explanation:This is the student page also used as home page. The whole data is fetched from Table (students) is shown on this page by using command: 

Select \* from students Primary Key (student\_id) 

Foreign Key (NULL) 

Navigation: 

From here, you can navigate to any page but cannot user URL Redirection to login page. You must have to logout in order to go there. All pages have the same navigation like this and same functionality.   

Note: The Functionality and Errors of each page will be discussed at the end of report. 

Teachers Page: 

Front End

![](images\teacher.jpeg)

Explanation:This is teachers page. All the data is fetched from Table (teacher). All data is fetched using command: 

Select \* from teacher  Primary Key (teacher\_id) 

Foreign Key (dep\_id) 

Dep\_id is used as a foreign key here. It’s ID is passed to the teacher table and then by using PHP/MySQL   get the name of the given ID and represent the name for easy to understand. 

Note: In every table which are containing any foreign key. ID is fetched from table and ID is set in table but instead of ID name is represented everywhere. 

Courses Page:     

Front End 

![](images\courses.jpeg)

Explanation: This is courses page. All the data is fetched from Table (courses). All data is fetched using command: 

Select \* from courses  Primary Key (course\_id) 

Foreign Key (NULL) 

Departments Page:     

Front End

![](images\dept.jpeg)

Explanation: This is courses page. All the data is fetched from Table (departments). All data is fetched using command: 

Select \* from departments  

Primary Key (course\_id) Foreign Key (NULL) 

Enrollments Page:     

Front End

![](images\front.png)![](images\enroll.jpeg)

Explanation: This is enrollments page. All the data is fetched from Table (enrollments). All data is fetched using command: 

Select \* from enrollments  

Primary Key (enroll\_id) Foreign Key (student\_id) Foreign Key (teacher\_id) Foreign Key (course\_id) 

In this table, there are three foreign keys. Student’s enrollments are recorded in this table with course id and teacher id 

Functionality of All Pages:     

There are three main functionalities on each page. You Can Add, Update or Delete the data. Each function is assigned to a button. As soon as the button is clicked, the action takes place. 

ADD: 

![](images\studentBtn.png)

This is button to add new information in any table. In student table it adds new students in teacher it adds new teacher and same in all other table as soon as button is clicked following action takes place. 

![](images\addstudent.jpeg)

Placeholders are used in order to get the idea what is used to place in the following row. Instead of department id, a drop down menu having the names of departments is assigned here. On backend ID is passed and store in table instead of names. 

Note: In each table where foreign key is used drop down menu is assigned to add and update the data.ID is passed to get information or to store information. Only for the easiness of user, names are represented in drop down menus. This function is same for teacher and enrollments table. 

Edit: 

![](images\editBtn.png)

This button is used to update the information of any table. As soon as the button click information of that row is fetched and appears in pop up modal 

![](images\editStudent.jpeg)

Delete: 

![](images\delBtn.png)

This is delete button. It is used to delete the information of given row. 

By clicking on this button, a pop up modal appears to confirm the delete action. This pop up modal is to verify the safety of data before removing it from the database completely. Following is the pop up modal: 

![](images\delCaution.png)

It has two simple action confirm the delete or cancel it. If you cancel it no action will occur and if you confirm it the data will be deleted from data base permanently. 

Errors: 

There are different types of error on each page according to the conditions. 

- In Students Email, Username, Phone and Roll No Cannot be repeated 
- In Teachers Email, Username and Phone cannot be repeated 
- In Courses two courses cannot have same course 
- In Departments two departments cannot have same name 
- In Enrollments, one Student cannot enroll same course from two teachers and cannot repeat the enrollment. 

![](images\error1.png)

![](images\error2.jpeg)

All the error messages are designed using sweealert2. This is library of JavaScript, which use its pop up boxes. 

Languages and there use: 

In this project four five language and some frameworks are used in order to complete the functionality according to the requirements. 

Php: 

**Php** is used in order to connect the database with the project, fetch, and store all the data. 

In simple words all, the database on backend is controlled using php. 

First, it is connecting the database. After that on each page table are represented by fetching data in php and linking it with HTML5. Drop Down menu are designed. All The pages are connected to each other and the data is passed from one page to other using php. 

HTML5: 

**HTML** is the standard markup language for Web pages With HTML you can create your own Website. 

All the data is represented in HTML tags. All the data that is viewable to user is fetched using php but represented by HTML tag. Different types of tags are used like table, select, div and many more according to the requirements. 

CSS/BootStrap4: 

HTML is simple language in order to design it and make it responsive according to the requirements we have to use CSS.  

Bootstrap4 is the framework of CSS, which make the work easy. All the pop up modal are designed using Bootstrap4. The responsiveness of page and navigation bar is also design in it. Each button is designed in it. Overall, for complete designing CSS is also used sometimes. 

JavaScript/AJAX: 

JavaScript is world most popular programming language of Web. Most of the functionality that used in bootstrap is due to JavaScript. Pop up modal use JavaScript on backend. 

AJAX is the combination of JavaScript and HTML DOM Simple Example to get the idea overall: 

Popup modal use Bootstrap to be design in HTML. However, this modal cannot link itself with PHP which link itself to MySQL database. We fetched ID in JavaScript passed it to AJAX, which passed it to PHP. PHP used this ID to fetch data and pass to AJAX. AJAX represent this data in popup modal. Therefore, JavaScript and AJAX made use of modal possible. 

All the error messages are using JavaScript library sweetalert2. 
