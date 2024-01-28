<?php
/* Smarty version 4.3.4, created on 2024-01-28 19:00:50
  from 'C:\project\lotto\resources\views\smarty\templates\results.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.4',
  'unifunc' => 'content_65b6a462390b86_65730052',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '35a196fce92433e49d7e6bd02a3343988a5c29c0' => 
    array (
      0 => 'C:\\project\\lotto\\resources\\views\\smarty\\templates\\results.tpl',
      1 => 1706468445,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_65b6a462390b86_65730052 (Smarty_Internal_Template $_smarty_tpl) {
?><h1>
    Win ticket number: <?php echo $_smarty_tpl->tpl_vars['data']->value['data'][0]['ticket']['number'];?>

    <br>
    Number of users: <?php echo $_smarty_tpl->tpl_vars['data']->value['total_count'];?>

    <br>
    Total winning prizes: <?php echo $_smarty_tpl->tpl_vars['data']->value['sum_prize'];?>

</h1>
<table>
    <thead>
    <tr>
        <th>Name</th>
        <th>Prize</th>
    </tr>
    </thead>
    <tbody>
    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['data']->value['data'], 'item');
$_smarty_tpl->tpl_vars['item']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['item']->value) {
$_smarty_tpl->tpl_vars['item']->do_else = false;
?>
        <tr>
            <td><?php echo $_smarty_tpl->tpl_vars['item']->value['user']['name'];?>
</td>
            <td><?php echo $_smarty_tpl->tpl_vars['item']->value['prize']['amount'];?>
$</td>
        </tr>
    <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
    </tbody>
</table>
<?php }
}
