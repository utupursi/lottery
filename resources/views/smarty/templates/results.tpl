<h1>
    Win ticket number: {$data.data[0].ticket.number}
    <br>
    Number of users: {$data.total_count}
    <br>
    Total winning prizes: {$data.sum_prize}
</h1>
<table>
    <thead>
    <tr>
        <th>Name</th>
        <th>Prize</th>
    </tr>
    </thead>
    <tbody>
    {foreach $data.data as $item}
        <tr>
            <td>{$item.user.name}</td>
            <td>{$item.prize.amount}$</td>
        </tr>
    {/foreach}
    </tbody>
</table>
