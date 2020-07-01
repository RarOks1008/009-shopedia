<?php include_once "data.php"; ?>
<p id="welcome_sign">Welcome back <?php echo $_SESSION['user']->username; ?>!</p>
<div class="main_panel">
    <h2>Your personal shopping list</h2>
    <table>
        <tr>
            <th>Number</th>
            <th>Name</th>
            <th>Quantity</th>
            <th>Measure</th>
            <th>Shop</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>
        <?php $item_num = 1; foreach($item_data as $item): ?>
        <tr>
            <td id="itemnum<?=$item_num;?>"><?=$item_num;?></td>
            <td id="itemname<?=$item_num;?>"><?=$item->name;?></td>
            <td id="itemquantity<?=$item_num;?>"><?=$item->quantity;?></td>
            <td id="itemmeasure<?=$item_num;?>" data-id="<?=$item->measure_id;?>"><?=$item->measure;?></td>
            <td id="itemshop<?=$item_num;?>" data-id="<?=$item->shop_id;?>"><?=$item->shop;?></td>
            <td><button onclick="item_edit_click(<?=$item_num;?>, <?=$item->item_id;?>)"><span class="far fa-edit"></span></button></td>
            <td><a href="api.php?page=item_delete&id=<?=$item->item_id;?>"><span class="far fa-trash-alt"></span></a></td>
        </tr>
        <?php $item_num++; endforeach; ?>
    </table>
</div>
<div class="main_panel not_first">
    <h2>Add or edit list item</h2>
    <table>
        <tr>
            <th>Number</th>
            <th>Name</th>
            <th>Quantity</th>
            <th>Measure</th>
            <th>Shop</th>
            <th>Save</th>
            <th>Discard</th>
        </tr>
        <tr>
            <form onsubmit="return add_edit_item_check()" method="POST" action="api.php?page=item_edit">
                <input type="hidden" name="item_add_edit_id" id="item_add_edit_id" value=""/>
                <td id="item_add_edit_number" data-id="<?=$item_num;?>"><?=$item_num;?></td>
                <td><input type="text" name="item_add_edit_name" id="item_add_edit_name" placeholder="Name"/></td>
                <td><input type="number" name="item_add_edit_quantity" id="item_add_edit_quantity" placeholder="Quantity" min="1"/></td>
                <td><select name="item_add_edit_measure" id="item_add_edit_measure">
                    <?php foreach($measure_data as $measure): ?>
                        <option value="<?=$measure->ID;?>"><?=$measure->name;?></option>
                    <?php endforeach; ?>
                </select></td>
                <td><select name="item_add_edit_shop" id="item_add_edit_shop">
                    <?php foreach($shop_data as $shops): ?>
                        <option value="<?=$shops->ID;?>"><?=$shops->name;?></option>
                    <?php endforeach; ?>
                </select></td>
                <td><button type="submit" name="item_add_edit_submit"><span class="fas fa-save"></span></button></td>
            </form>
            <td><button onclick="item_edit_discard()"><span class="fas fa-times-circle"></span></button></td>
        </tr>
    </table>
</div>
<div class="main_panel not_first your_shops">
    <h2>Your personal shops</h2>
    <table>
        <tr>
            <th>Number</th>
            <th>Name</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>
        <?php $shop_num = 1; foreach($shop_data as $shop): ?>
        <tr>
            <td id="shopnum<?=$shop_num;?>"><?=$shop_num;?></td>
            <td id="shopname<?=$shop_num;?>"><?=$shop->name;?></td>
            <td><button onclick="shop_edit_click(<?=$shop_num;?>, <?=$shop->ID;?>)"><span class="far fa-edit"></span></button></td>
            <td><a href="api.php?page=shop_delete&id=<?=$shop->ID;?>"><span class="far fa-trash-alt"></span></a></td>
        </tr>
        <?php $shop_num++; endforeach; ?>
    </table>
</div>
<div class="main_panel not_first your_shops">
    <h2>Add or edit a shop</h2>
    <table>
        <tr>
            <th>Number</th>
            <th>Name</th>
            <th>Save</th>
            <th>Discard</th>
        </tr>
        <tr>
            <form onsubmit="return add_edit_shop_check()" method="POST" action="api.php?page=shop_edit">
                <input type="hidden" name="shop_add_edit_id" id="shop_add_edit_id" value=""/>
                <td id="shop_add_edit_number" data-id="<?=$shop_num;?>"><?=$shop_num;?></td>
                <td><input type="text" name="shop_add_edit_name" id="shop_add_edit_name" placeholder="Name"/></td>
                <td><button type="submit" name="shop_add_edit_submit"><span class="fas fa-save"></span></button></td>
            </form>
            <td><button onclick="shop_edit_discard()"><span class="fas fa-times-circle"></span></button></td>
        </tr>
    </table>
</div>
