# ShopOnline - WebApp

-   We're hosted at [here](https://shoponline-web.000webhostapp.com/)

### An E-commerce platform in form of a Web Application incorporating concepts of DBMS along with PHP, HTML, CSS.

The ShopOnline Web Application was developed using HTML, CSS, Javascript, PHP, phpMyAdmin, MySQL and XAMPP as a result of implementation of key concepts of DBMS such as normalization for an efficient database design.

Project maintainers:

-   Sudhay Senthilkumar ([@sudhay23](https://github.com/sudhay23))
-   Sandeep Rajakrishnan ([@san-coding](https://github.com/san-coding))
-   Raswanth R
-   Tarun K B
    > (Screenshots are not in order of workflow, please visit the hosted live website to check out the project)
    > <img width="1440" alt="Screenshot 2021-09-17 at 8 57 38 PM" src="https://user-images.githubusercontent.com/65719940/133892074-86556054-7643-43c5-b3c6-f1d0d3ccb22b.png"> > <img width="1440" alt="Screenshot 2021-09-17 at 8 57 05 PM" src="https://user-images.githubusercontent.com/65719940/133892076-943284a4-e821-4dcb-b8b9-c8e050246276.png"> > <img width="644" alt="Screenshot 2021-09-17 at 8 56 47 PM" src="https://user-images.githubusercontent.com/65719940/133892078-dad5c846-6202-42ac-8b85-d6e087c6065c.png"> > <img width="1440" alt="Screenshot 2021-09-17 at 8 56 30 PM" src="https://user-images.githubusercontent.com/65719940/133892080-fdfc2118-8e4c-4f1f-bc77-6b812ac9dc38.png"> > <img width="1440" alt="Screenshot 2021-09-17 at 8 51 29 PM" src="https://user-images.githubusercontent.com/65719940/133892083-0895e83f-749a-4ad9-a6e1-6b7fa18b3fc8.png"> > <img width="1440" alt="Screenshot 2021-09-17 at 8 51 56 PM" src="https://user-images.githubusercontent.com/65719940/133892084-8283e3ee-a9a8-4988-a06a-6bbf5b37dd20.png"> > <img width="1440" alt="Screenshot 2021-09-17 at 8 56 18 PM" src="https://user-images.githubusercontent.com/65719940/133892088-29ddd8c7-ff61-450f-87a3-6e46b862ca8f.png">

## Installation
### Locally with XAMPP

- Clone the repo to yout local machine:

    `git clone https://github.com/sudhay23/ShopOnline-Web-App.git`
![git clone](Screenshots\git_clone.png)

- Download and install XAMPP:

    [XAMPP](https://www.apachefriends.org/de/download.html)

    - Start the downloaded installer (.exe)
    ![xampp install](Screenshots\xampp_install_1.png)
    - ![xampp install](Screenshots\xampp_install_2.png)
    - Select Components as you wish but keep MySQL selected, a database is needed:
    ![xampp install](Screenshots\xampp_install_3.png)
    - Select location where you want to install xampp:
    ![xampp install](Screenshots\xampp_install_4.png)
    - Selecte prefered language:
    ![xampp install](Screenshots\xampp_install_5.png)
    - ![xampp install](Screenshots\xampp_install_6.png)
    - After clicking on Next > the installation will start:
    ![xampp install](Screenshots\xampp_install_7.png)
    - ![xampp install](Screenshots\xampp_install_8.png)

- Copy/Paste the cloned repo into the `htdocs` folder of your XAMPP installation directory

    > for example: C:\xampp\htdocs


- Start Apache Webser and hte MySQL database, for example over the XAMPP Control Panel
    - Open the control panel
    ![xampp control panel](Screenshots\xampp_control_panel_1.png)
    or execute C:\xampp\xampp-control.exe
    - Start Apache and MySQL:
    ![xampp control panel](Screenshots\xampp_control_panel_2.png)
    - When the Modul is highlighted green your good to go:
    ![xampp control panel](Screenshots\xampp_control_panel_3.png)

- Import `shoponline.sql` to your database, for example over phpMyAdmin

    > http://localhost/phpmyadmin/

    - Create a new database:
    ![phpmyadmin](Screenshots\phpmyadmin_1.png)
    - On the Import Tab click search and select shoponline.sql afterwards click OK
    ![phpmyadmin](Screenshots\phpmyadmin_2.png)
    - ![phpmyadmin](Screenshots\phpmyadmin_3.png)
    - ![phpmyadmin](Screenshots\phpmyadmin_4.png)
    - ![phpmyadmin](Screenshots\phpmyadmin_5.png)

- Now you can visite the site:

    > http://localhost/ShopOnline-Web-App/

    - ![ShopOnline-Web-App](Screenshots\ShopOnline-Web-App.png)