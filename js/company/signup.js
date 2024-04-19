import Page from "../PageContent/Page.js";
import request from "../request.js";
window.onload = function () {
    let page = new Page();
    document.getElementById('root').innerHTML = page.com_reg()
    document.getElementById('register').onclick = () => {
        let name = document.getElementById('name');
        let area = document.getElementById('area');
        let address = document.getElementById('address');
        let email = document.getElementById('email');
        let phone = document.getElementById('phone');
        let account = document.getElementById('account');
        let password = document.getElementById('password'); //<input id='password'>
        //傳入後端
        let data = {
            name:name.value,
            area:area.value,
            address:address.value,
            email:email.value,
            phone:phone.value,
            account:account.value,
            password:password.value,
            role:'company'
        }
        request().post('index.php?action=newCompany',Qs.stringify(data))
        .then((res)=>{
            let response = res['data'];
            if (response['status'] == 200 ){
                alert('註冊成功')
                location.href = "com_login.html"
            }
            else{
                alert('註冊失敗')
                
            }
        })
        .catch((err)=>{
            console.log(err)
        })

    }



    
}