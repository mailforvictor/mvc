<link rel="stylesheet" href="/layout/default/css/checkout.css">

<div class="checkout-box">
    <form name="checkout" action="ticket/checkout" method="post">
        <h1>Customer Form</h1>
        <label for="payment-name">Payment name<span>*</span>
            <select name="payment-name">
                <option value=""></option>
                <option value="1">Credit and Debit Cards</option>
                <option value="2">Deposit</option>
                <option value="3">PayPal</option>
                <option value="4">Bit</option>
                <option value="5">iBanking</option>
            </select>
        </label>
        <h4>Title<span>*</span></h4>
        <div class="title-block">
            <select name="select-title">
                <option value="title" selected>Title</option>
                <option value="ms">Ms</option>
                <option value="miss">Miss</option>
                <option value="mrs">Mrs</option>
                <option value="mr">Mr</option>
            </select>
            <input class="name" type="text" name="firstname" placeholder="First"/>
            <input class="name" type="text" name="lastname" placeholder="Last"/>
        </div>
        <label for="email">Email<span>*</span>:
            <input type="text" name="email"/>
        </label>
        <label for="phone">Password<span>*</span>:
            <input type="text" name="password"/>
        </label>
        <label for="phone">Phone number<span>*</span>:
            <input type="text" name="phone"/>
        </label>
        <label for="country">Country<span>*</span>:
            <input type="text" name="country"/>
        </label>
        <label for="city">City<span>*</span>:
            <input type="text" name="city"/>
        </label>
        <label for="zip">Zip<span>*</span>:
            <input type="text" name="zip"/>
        </label>
        <label for="address">Address<span>*</span>:
            <input type="text" name="address"/>
        </label>
        <label for="home">Home, apartment<span>*</span>:
            <input type="text" name="home"/>
        </label>
        <label for="comments">
            <textarea rows="5" name="comments"></textarea>
        </label>
        <input type="hidden" name="token" value="<?= $token ?>">
        <div class="btn-block">
            <button type="submit">Checkout</button>
        </div>
    </form>
</div>
</body>
</html>