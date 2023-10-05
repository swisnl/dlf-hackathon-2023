<form method="POST" action="{{ route('transactions.store') }}">
    @csrf
    <label>
        amount
        <input type="number" name="amount" placeholder="Amount">
    </label>
    <label>
        orderId
        <input type="text" name="orderId" placeholder="Order Id">
    </label>
    <button type="submit">Submit</button>
</form>
