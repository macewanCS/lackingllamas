<script>
h1{font-size: 7em;}
h2{font-size: 4em;}
<p>
{
padding-right:8em
}
</script>

<h1><b>MacEwan University</h1></b>
CMPT 395, Winter 2016 
EPL Business Plan Solution

<h2><b>Introduction</h2></b>

<p>This document is intended to indicate how we will provide a solution for the Edmonton Public Library’s business plan problem. </p>

<h2><b>The Problem</h2></b>
<p>The Edmonton Public Library develops business plans every 3 - 5 years in which teams and departments have specific actions they are expected to complete. Currently, each Team or Department have separate excel spreadsheets that lack structure. Updating and maintaining the spreadsheets is fairly inconvenient and takes a lot of time.
</p>

<h2><b>The Solution</h2></b>
<p>We plan to provide a web-based based application for tracking and reporting on business plans which will allow smooth collaboration between several users. Users will be able to view business plans, and update specific items based on their permissions.
</p>

<h2><b>GOAT Structure</h2></b>
<p>There are 4 levels in the GOAT hierarchy from most broad to most specific, they are: Goals Objectives, Actions, Tasks.
</p>
<p>1.<b>Goals:</b> are the highest level in the hierarchy, they are defined in business plan and most broadly define an objective of the business plan.
</p>
<p>2.<b>Objectives:</b> are all below a goal, although there may be multiple objectives per goal. 
</p>
<p>2.<b>Actions:</b> exist under Objectives and is created by the teams and departments on their own. Non-BP Actions can be created, and will not be tied to any particular objective.
</p>
<p>3.<b>Tasks:</b> are under Actions, making them the most specific part of the business plan.
</p>
<h2><b>Features</b></h2>
<ul>
<li>View the business plan in an organized tableview.</li>
<li>Ability to edit and update the business plan.</li>
<li>User management will provide tools to organise employees hierarchically which will improve organisation and yield faster results in communication.</li>
<li>Team/Department management will provide tools to edit teams further increasing organization.</li>
<li>The ability to view and sort the business plan in a logical and useful manner.</li>
<li>Provide a more sophisticated structure to organize budget to increase savings and management of budget.</li>
</ul>

<h2><b>Users</h2></b>
<p>There are 5 types of users. In order of most privileges to least, they are: Admin, BP Lead, Team/Department Lead, Team/Department Member and Read Only User. 
</p>
<ul>
<li>The <b>Admin</b> is a type of user that can add, modify and remove users from the system. The admin can also add, modify and remove business plans from the system. The admin is intended to be a user role that maintains the system in the form of managing other users.
<li>The <b>BP Lead</b> is a type of user that can add, modify and remove business plans from the system. The BP Lead will add overarching Goals, and then Objectives to the system. Once Objectives have been added, the BP Lead will be responsible for adding collaborators for each objective. The BP Lead user role is intended for the Business Plan leaders within the Edmonton Public Library. BP Lead users will also be able to generate reports that will encompass the progress on the overall business plan.</li>
<li>The <b>Team/Department Lead</b> is a type of user that can add, or remove users from their team. They are also responsible for creating Actions and Tasks for the objectives that they are assigned. Once Tasks have been created, the Team/Department Lead can assign Tasks to certain users within their Team/Department. The Team/Department Lead can also create non-business plan actions and tasks. This user role is intended for Team & Department leaders within the Edmonton Public Library to maintain their Team or Department.</li> 
<li>The <b>Team/Department Member</b> is a type of user that can update tasks given to them by their Team/Department leader. This user role is intended for any members of Teams or Department within the Edmonton Public Library. Team/Department Members will be able to belong to several Teams or Departments at once, and will be able to view all relevant tasks assigned to them in one place.</li>
<li>The <b>Read Only User</b> is a type of user that does not need to log in, and has access to view all the information in the business plan, but cannot edit anything.</li> 
</ul>
