# TODO

User Permissions:

Administrator: Full management / Create supervisors.
Supervisor: Manages the organization and its users and actions.
Basic: User created by the Supervisor and responsible for the respective action.

# INTERFACE REFERENCE

https://github.com/leda-ferreira/yii2-app-basic-admin-lte
https://github.com/jakim/ig-monitoring#screenshots
https://sentimnt.io/

# DATABASE SCHEMA 

== user ==
id
username
----------------------
== organization ==
id
name
logo
----------------------
== action ==
id
organization_id
name
user_owner
user_responsible
start_date
finish_date
status_id
observation
created
updated
----------------------
== status ==
id
organization_id
user_id
name
color
----------------------