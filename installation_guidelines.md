# Installation Guideline
## Locally with XAMPP

- Download and install XAMPP:

    [XAMPP](https://www.apachefriends.org/de/download.html)

    - Start the downloaded installer (.exe) and press Yes/Ja
    ![xampp install](Screenshots\xampp_install_1.png)
    - Probably there will be pop-up a Question and Warning
    ![xampp install](Screenshots\xampp_install_question.png)
    ![xampp install](Screenshots\xampp_install_warning.png)
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

- Goto the `htdocs` folder of your XAMPP installation directory and clone the repo to yout local machine

    > for example: C:\xampp\htdocs
    - Click in on the adressbar and type `cmd` to open a new comand prompt
    ![xampp htdocs](Screenshots\xampp_htdocs.png)
    - `git clone https://github.com/sudhay23/ShopOnline-Web-App.git`
    ![git clone](Screenshots\git_clone.png)

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
    ![phpmyadmin](Screenshots\phpmyadmin_0.png)
    - Create a new database:
    ![phpmyadmin](Screenshots\phpmyadmin_1.png)
    - On the Import Tab click slect file and select shoponline.sql afterwards click OK
    ![phpmyadmin](Screenshots\phpmyadmin_2.png)
    - ![phpmyadmin](Screenshots\phpmyadmin_3.png)
    - ![phpmyadmin](Screenshots\phpmyadmin_4.png)

- Now you can visite the site:

    > http://localhost/ShopOnline-Web-App/

    - ![ShopOnline-Web-App](Screenshots\ShopOnline-Web-App.png)