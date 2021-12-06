## Big O Notation

- Can objectively describe the efficiency of the code without the use of concrete units
  (Not using milliseconds or seconds).
- We will not measure space in terms of kilobytes or even bytes.
- Big O just Analyze the time and space in terms of how it scales with the size of the input.
- Prepare for the worst Case Scenario

```javascript
const calcAverage = (numbers) => {
    let sum = 0;
  
    for (let i = 0; i < numbers.length; i++) {
        let number = numbers[i];
        sum += number;
    }
  
    return sum / numbers.length;
}
```
####Time Complexity
- Sum definition is trivial only happens once  O(1) 
- For-loop it loops through all the numbers(n) O(n)
- Return is Also a trivial line happens once   O(1)
- O(1+n+1) => O(n)
- We dropped the constants since it make it easier to compare it with other solutions

###Fast Rules
####Product Rule
- If the big(O) is the product of multiple terms, drop the constant terms such as static numbers like 1,2 anything not a variable.
- O(4 * n) = O(m)
- O(512 * n) = O(m)
- O(n / 3) = O( (1 / 3 ) n) = O(n)
- O( 5 * n * n ) = O(n*n) = O(n^2)
- O(8000) = O(1)

####Sum Rule
- If the big(O) is the sum of multiple Terms, only keep the largest Term, drop the rest.
- O(n + 1000) = O(n)
- O(n^2 + n) = O(n^2)
- O(n + 500 + n^3 + n^2) = O(n^3)

####The Two rules Together Examples
- O(5n^2 + 100n + 17) = O(n^2 + n) = O(n^2)
- O( (n/3)^6 + 10n ) = O(n^6)

####Example #1
```javascript
const foo = (n) => {
    for(let i = 0; i < n/2; i++) { // O(n/2) = O(n)
        console.log(i);
    }
    
    // Whenever you have a nested loop this is a mulipication here n*n = n^2
    for (let b = 0; b < n; i++) {
      for (let b = 0; b < n; i++) {
        console.log(b+c);
      }
    }
}

foo(100);
```
####Time Complexity
- O(n + n^2) = O(n^2)

###Space Complexity
- How much space we use (Variables, objects that grow)


```javascript
const calcAverage = (numbers) => {
  let sum = 0; // Created Once O(1)

  // I definition is also created once O(1)
  for (let i = 0; i < numbers.length; i++) {
    // With each iteration we override the value of number we don't instantiate it again
  	let number = numbers[i]; 
    sum += number;
  }

  return sum / numbers.length;
}
```
####Space Complexity
- O(3) = O(1) 


```javascript
const doubler = (items) => {
  let newArray = [];
  
  for (let i = 0; i < numbers.length; i++) {
  	// With each iteration we push to the array 2n times 
  	newArray.push(items[i]);
  	newArray.push(items[i]);
  }

  return newArray;
}
```
####Space Complexity
- O(2n) = O(n)


```javascript
const unique = (numbers) => {
  const newArray = []; // O(1)
  
  // For-loop we have O(n)
  for (let i = 0; i < numbers.length; i++) {
  	const ele = numbers[i];
  	
  	// Here we loop through newArray Every time to check if it has the value or not 
    // in the worst case we loop on all the n elements O(n)
  	if(! newArray.includes(ele)) {
  		
  		// Here O(n)
  		newArray.push(ele);
    }
  }

  return newArray;
}
```

####Time Complexity
- O(n * n) = O(n^2)

####Space Complexity
- O(n) Pushing to the array n elements 

Okay how we could improve the n square 

```javascript
const unique = (numbers) => {
  const newArray = new Set(); // O(1) Hashed data structure
  
  // For-loop we have O(n)
  for (let i = 0; i < numbers.length; i++) {
  	const ele = numbers[i];
    newArray.add(ele); // O(1)
  }

  return newArray;
}
```

####Time Complexity
- O(n)

####Space Complexity
- O(n) 
