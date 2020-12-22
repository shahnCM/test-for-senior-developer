<?php

namespace App\Services;

// Models
use App\Buyer;
use App\Diary;
use App\Pen;
use App\Eraser;
use App\Record;

// Facades
use Illuminate\Support\Facades\DB;

class TemplateService
{
  public function callbackCode()
  {
    return 
    ("

      var data = {email:'trump@gmail.com', age:70}

      // Defining Function:checkAge, Calling Function:callback
      const checkAge = function(data, callback){
          if (typeof callback == 'function') 
              console.log(callback(data))
      } 

      // Calling Function:checkAge, Passing Callback Definition.
      checkAge(data, function(data){
          if(data.age < 18)
              return 'Age is not valid'

          return 'Age is valid'	
      })
    
    ");
  }

  public function sortJsCode()
  {
    return
    ('
 
      var fruits = ["Banana", "Orange", "Apple", "Mango"];
      fruits.sort();        // Sorts the elements of fruits
      
      Output: Apple,Banana,Mango,Orange
    
    ');
  }

  public function foreachJsCode()
  {
    return
    ('
    
      const items = [12, 24, 36]; 
      const copy = []; 

      items.forEach(function (item) { 
          copy.push(item + item+2); 
      }); 
      
      console.log(copy);

      Output: [26,50,74]
    
    ');
  }

  public function filterJsCode()
  {
    return
    ('
    
      var numbers = [1, 3, 6, 8, 11];

      var lucky = numbers.filter(function(number) {
        return number > 7;
      });
      
      Output: [8, 11]    
    
    ');
  }

  public function mapJsCode()
  {
    return
    ('
    
      const sweetArray = [2, 3, 4, 5, 35]
      const sweeterArray = sweetArray.map(sweetItem => {
          return sweetItem * 2
      })
      
      console.log(sweeterArray)
      
      Output: [4, 6, 8, 10, 70]    
    
    ');
  }

  public function reduceJsCode()
  {
    return
    ('
    
      // Using Loop:

      const value = 0;

      const numbers = [5, 10, 15];
      
      for(let i = 0; i < numbers.length; i++) {
        value += numbers[i]; // 30
      }   

      // Using Array Reduce: Helps to avoid mutating "const value"

      // this is our initial value i.e. the starting point
      const initialValue = 0;

      // numbers array 
      const numbers = [5, 10, 15];

      // we give the reduce method our reducer function and our initial value 
      const total = numbers.reduce((accumulator, item) => {
        return accumulator + item
      }, initialValue)

	  console.log(total) // 30
    
    ');
  }

  public function imFunnyAnswer()
  {
    return (object)
      ['a' => (object)
              ['part_1' => 'Current Condition: A major fact is being noticed that most of the IT firms continue their business in local market. 
              A statistics of BASIS says that 63% of them are focused in local market which supposed to be a 
              barrier in globalizing this sector. The rest are trying to put a mark in global market and 
              maintaining their quality. The trend shows that there has been a consistent growth in this market.',

              'part_2' => 'Difference from other developed country: Our Engineers work more as well as harder for what they have been payed',

              'part_3' =>  'Future: The industry experts believes that there should be regular upgrades in skill sets or in 
              others platforms of software industries. In the upcoming decades advanced technologies like Cloud Computing, 
              Storage Networking or LTE should be replaced in todays’ technologies. Whatever happens software companies 
              have to put a step regarding this issue thinking about the future. If they can cope with change of decades 
              they will certainly continue their current run and their rate of success will last long securing a bright future.']
      ,
      'b' => 'Two Fathers, Two Sons do not necessarily mean 4 persons. There is Grandfather, Father & a Son. 
              The son is father to none and his father is the son of his grandfather. So there are 2 fathers and 2 sons
              and all of counts to 3.
              We need not piece / kill / cut any fish as there are 
              3 Persons in total and 3 Fishes, Each Person will have 1 Fish'
      ];
  }

}