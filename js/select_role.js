import Page from "./PageContent/Page.js"
import request from "./request.js"
window.onload = function(){
    const page = new Page()
    document.getElementById('root').innerHTML = page.select_role()
}