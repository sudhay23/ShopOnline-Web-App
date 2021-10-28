# Installation Guideline
## Locally with XAMPP

- Download and install XAMPP:

    [XAMPP](https://www.apachefriends.org/de/download.html)

    - Start the downloaded installer (.exe) and press Yes.

    ![xampp_install_1](https://user-images.githubusercontent.com/16044116/135674699-c543c94a-9109-4681-b25d-dc53e66bbdad.png)
    - Probably there will be pop-up a Question and Warning

    ![xampp_install_question](https://user-images.githubusercontent.com/16044116/135674735-c90d1fda-81be-4c3a-bd40-40778c51828e.png)

    ![xampp_install_warning](https://user-images.githubusercontent.com/16044116/135674747-41aaadb7-7d1e-4f22-a504-c9954f3dae6e.png)
    - 
    ![xampp_install_2](https://user-images.githubusercontent.com/16044116/135674723-e9e72dd8-c151-44b4-9cc8-f1bae40fc37f.png)
    - Select Components as you wish but keep MySQL selected, a database is needed:

    ![xampp_install_3](https://user-images.githubusercontent.com/16044116/135674758-6744f71b-540f-4b2b-a22b-196da16c600f.png)
    - Select location where you want to install xampp:

    ![xampp_install_4](https://user-images.githubusercontent.com/16044116/135674767-05c66f78-3cf8-4607-9662-650cde1ee658.png)
    - Select preferred language:

    ![xampp_install_5](https://user-images.githubusercontent.com/16044116/135674777-3e285e7f-ce99-433d-9c88-bd77cb300215.png)

    - 
    ![xampp_install_6](https://user-images.githubusercontent.com/16044116/135674796-e4f85db6-126d-47e0-afc9-d901a851ee52.png)
    - After clicking on Next > the installation will start:

    ![xampp_install_6](https://user-images.githubusercontent.com/16044116/135674806-9bbf2077-89ba-4fb6-8435-cc37e12502b0.png)

    - 
    ![xampp_install_8](https://user-images.githubusercontent.com/16044116/135674812-f00ae832-118d-4e85-9e8b-14fa45f54f0e.png)

- Goto the `htdocs` folder of your XAMPP installation directory and clone the repo to yout local machine

    > for example: C:\xampp\htdocs
    - Click in on the adressbar and type `cmd` to open a new comand prompt

    ![xampp_htdocs](https://user-images.githubusercontent.com/16044116/135674843-ee561166-735e-45e9-88e0-4c1810c3c680.png)
    - `git clone https://github.com/sudhay23/ShopOnline-Web-App.git`

    ![git_clone](https://user-images.githubusercontent.com/16044116/135674854-c9d16c3a-6e0c-4858-86d3-e7c14fa6deba.png)

- Start Apache Webser and hte MySQL database, for example over the XAMPP Control Panel
    - Open the control panel

    ![xampp_control_panel_1](https://user-images.githubusercontent.com/16044116/135674865-bdc8646f-ed52-4491-aba5-b61012fd8a67.png)
    or execute C:\xampp\xampp-control.exe
    - Start Apache and MySQL:

    ![xampp_control_panel_2](https://user-images.githubusercontent.com/16044116/135674870-9c17c6f6-6867-4dee-ab1c-d1500e57e7bf.png)
    - When the Modul is highlighted green your good to go:

    ![xampp_control_panel_3](https://user-images.githubusercontent.com/16044116/135674877-7f0446b5-03bc-4a45-9e24-f29e62ea3d39.png)

- Import `shoponline.sql` to your database, for example over phpMyAdmin

    > http://localhost/phpmyadmin/

    ![phpmyadmin_0](https://user-images.githubusercontent.com/16044116/135674889-0047b978-8682-4a45-8314-ab28eeb7ee39.png)
    - Create a new database:

    ![phpmyadmin_1](https://user-images.githubusercontent.com/16044116/135674893-dcbc20e1-0607-4da5-b04e-ce0b4b7143ee.png)
    - On the Import Tab click slect file and select shoponline.sql afterwards click OK

    ![phpmyadmin_2](https://user-images.githubusercontent.com/16044116/135674911-909a56d6-3b7e-4b49-b0c0-0be1d5ab4e2d.png)
    - 
    ![phpmyadmin_3](https://user-images.githubusercontent.com/16044116/135674921-e9992ded-6897-49df-8d62-d334fce2a214.png)
    - 
    ![phpmyadmin_4](https://user-images.githubusercontent.com/16044116/135674927-a5ca269a-3e76-4831-8e9b-0d218e050270.png)
    
- Configure `.env` file
    - Update `.env.sample` to `.env` file under `ShopOnline-Web-App/With PHP/backend/`
   
    ![1](https://user-images.githubusercontent.com/51874681/136151757-d9d241e9-8f7f-4656-9af2-7c7dee228c6b.PNG)

- Make sure you have the default :
    - `root` user account
    - localhost
    - No password
    - all privileges granted
    
    ![2](https://user-images.githubusercontent.com/51874681/136151806-31998f3a-764e-472f-84db-1b6eadf0e1c1.PNG)

- Now you can visit the site:

    > http://localhost/ShopOnline-Web-App/

    ![ShopOnline-Web-App](https://user-images.githubusercontent.com/16044116/135674936-59d1d1a9-7be0-4eac-a4db-f81baf0f61ae.png)
