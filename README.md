<h1>AboGabalMyFatoorah, V1.0</h1>
<p>MyFatoorah Payment Gateway simple php library.</p>

- At first this application is not affiliated 
   with the company that owns this Payment gateway
   
**<h3>How to run our app for test.</h3>**
- just download our app then put it 
 in your local server projects source and
 run it on your local server, finally open 
 `localhost` in your browser and start testing.
   
**<h3>How To Integration.</h3>**
 * For all classes that available in our scale you
 can load it by include
 `config/config.php` And `src/autoload.php` 
 then run our classes as follows: <br>
1- `initiatePayment` Class, this step will simply
  return you all available 
  <a href="https://myfatoorah.readme.io/docs/payment-methods">Payment Methods</a> for the account with the actual charge that the customer will pay on the gateway. <a href="https://myfatoorah.readme.io/docs/api-initiate-payment"> Example for request and response</a><br> 
2- `executePayment` Class, once the payment has been initiated, this step will do execute the actual transaction creation at MyFatoorah platform and will return to your application the URL to redirect your customer to make the payment. <a href="https://myfatoorah.readme.io/docs/api-execute-payment">Example for request and response</a><br>
3- `checkoutPayment` Class, these class will checkout your purchase process. <a href="https://myfatoorah.readme.io/docs/api-direct-payment">Example for request and response</a><br>
4- `paymentEnquiry` Class, finally these class get your payment status and all information that you put it and the api response of billing status after confirm your payment process. <a href="https://myfatoorah.readme.io/docs/api-payment-enquiry">Example for request and response</a>.<br>
  
**<h3>For test apis away from our app.</h3>**
- Please visit this <a href="https://apitest.myfatoorah.com/swagger/ui/index#/Payment">link</a>.

**<h3>Demo information</h>.**
- Url: `https://apitest.myfatoorah.com`
- Api key: `fVysyHHk25iQP4clu6_wb9qjV3kEq_DTc1LBVvIwL9kXo9ncZhB8iuAMqUHsw-vRyxr3_jcq5-bFy8IN-C1YlEVCe5TR2iCju75AeO-aSm1ymhs3NQPSQuh6gweBUlm0nhiACCBZT09XIXi1rX30No0T4eHWPMLo8gDfCwhwkbLlqxBHtS26Yb-9sx2WxHH-2imFsVHKXO0axxCNjTbo4xAHNyScC9GyroSnoz9Jm9iueC16ecWPjs4XrEoVROfk335mS33PJh7ZteJv9OXYvHnsGDL58NXM8lT7fqyGpQ8KKnfDIGx-R_t9Q9285_A4yL0J9lWKj_7x3NAhXvBvmrOclWvKaiI0_scPtISDuZLjLGls7x9WWtnpyQPNJSoN7lmQuouqa2uCrZRlveChQYTJmOr0OP4JNd58dtS8ar_8rSqEPChQtukEZGO3urUfMVughCd9kcwx5CtUg2EpeP878SWIUdXPEYDL1eaRDw-xF5yPUz-G0IaLH5oVCTpfC0HKxW-nGhp3XudBf3Tc7FFq4gOeiHDDfS_I8q2vUEqHI1NviZY_ts7M97tN2rdt1yhxwMSQiXRmSQterwZWiICuQ64PQjj3z40uQF-VHZC38QG0BVtl-bkn0P3IjPTsTsl7WBaaOSilp4Qhe12T0SRnv8abXcRwW3_HyVnuxQly_OsZzZry4ElxuXCSfFP2b4D2-Q`
- Test cards: https://myfatoorah.readme.io/docs/test-cards

> Unfortunately, not all gateways provide a Test Cards to be used during the development phase, we will keep this list updated as soon as we got any new piece of information

**<h3>Available payment methods.</h3>**
- https://myfatoorah.readme.io/docs/payment-methods

**<h3>Supported currencies.</h3>**
- https://myfatoorah.readme.io/docs/api-lookups

**<h3>Live API.</h3>**
- For the live API, you will need to use the 
following URL https://api.myfatoorah.com
and the API key from your portal admin access, 
check it here 
<a href="https://myfatoorah.readme.io/docs/create-live-account">Create Live Account</a>.<br>

**Notices:** 
- For replace demo information with your live api key
and live api url you can change it from `config/configClass.php`.
- put you live api key without `bearer` which is locate
  at the first of the key obtained because our app add it automatically.
- For add additional currencies you can uncomment any 
- Ui of our app for only make our app is 
obvious to you and make our  code is easy for use.
- some data we put it by default, you can set it
with your data if you want.

Enjoy!

<hr>

**For more details visit <a href="https://myfatoorah.readme.io/docs/overview">the own company site</a>.**
