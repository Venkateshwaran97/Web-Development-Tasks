
var s=new Array();
var i=5;
var j=5;
function ask()
 {  var n; 


n= prompt("Enter value:");
s.push(n);
var bar=document.createElement("div");
bar.className='bar';
bar.setAttribute("style","height:"+ n +"px;left:"+ i +"px;");
i=i+30;
var z=document.getElementById("main");
z.appendChild(bar);
 
return true;
}

function sort()
{  j=5;
s.sort(function(a,b){return(a-b)});
document.getElementById("main").innerHTML=" ";
for(var i=0;i<s.length;i++)
{var bar=document.createElement("div");
bar.className='bar';
bar.setAttribute("style","height:"+ s[i] +"px;left:"+ j +"px;");
j=j+30;
var z=document.getElementById("egraphv");
z.appendChild(bar);




}
return true;


}

