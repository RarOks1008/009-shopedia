<?php include_once "data.php"; ?>
<p id="welcome_sign">Welcome back <?php echo $_SESSION['user']->username; ?>!</p>
<div class="admin_panel">
    <h2>Admin Page</h2>
    <div class="admin_item">
        <h3>Add Measure</h3>
        <form onsubmit="return add_measure_check()" method="POST" action="api.php?page=add_measure">
            <input type="text" name="add_measure" id="add_measure" Placeholder="Measure"/>
            <button type="submit" name="submit_add_measure">Add</button>
        </form>
    </div>
    <div class="admin_item with_more">
        <div class="more_admin_options">
            <h3>Edit Measure</h3>
            <select id="measure_edit_select" onchange="admin_measure_change()">
                <?php foreach($measure_data as $measure): ?>
                    <option value="<?=$measure->ID;?>"><?=$measure->name;?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <form class="more_admin_options" onsubmit="return edit_measure_check()" method="POST" action="api.php?page=edit_measure">
            <input type="hidden" name="edit_measure_id" id="edit_measure_id"/>
            <input type="text" name="edit_measure" id="edit_measure" Placeholder="Measure"/>
            <button type="submit" name="submit_edit_measure">Edit</button>
        </form>
    </div>
    <div class="admin_item">
        <h3>Delete Measure</h3>
        <form onsubmit="return delete_measure_check()" method="POST" action="api.php?page=delete_measure">
            <select id="measure_delete_select" name="measure_delete_select">
                <?php foreach($measure_data as $measure): ?>
                    <option value="<?=$measure->ID;?>"><?=$measure->name;?></option>
                <?php endforeach; ?>
            </select>
            <button type="submit" name="submit_delete_measure">Delete</button>
        </form>
    </div>
    <div class="admin_item">
        <h3>Delete User</h3>
        <form method="POST" action="api.php?page=delete_user">
            <select id="user_delete_select" name="user_delete_select">
                <?php foreach($user_data as $user): ?>
                    <option value="<?=$user->ID;?>"><?=$user->username;?></option>
                <?php endforeach; ?>
            </select>
            <button type="submit" name="submit_delete_user">Delete</button>
        </form>
    </div>
    <div class="admin_item with_more">
        <div class="more_admin_options">
            <h3>Extend or demote user right</h3>
            <select id="user_change_select" onchange="admin_user_change()">
                <?php foreach($user_data as $user): ?>
                    <option value="<?=$user->ID;?>" data-id="<?=$user->role_id;?>"><?=$user->username;?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <form class="more_admin_options" onsubmit="return edit_user_check()" method="POST" action="api.php?page=edit_user">
            <input type="hidden" name="edit_user_right_id" id="edit_user_right_id"/>
            <select id="user_right_select" name="user_right_select">
                <?php foreach($role_data as $role): ?>
                    <option value="<?=$role->ID;?>"><?=$role->role;?></option>
                <?php endforeach; ?>
            </select>
            <button type="submit" name="submit_edit_user_id">Edit</button>
        </div>
    </div>
</div>
