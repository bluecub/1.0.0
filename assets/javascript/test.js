function ramanujan(n){

    var object = {};
    var arr = []

    var cubeRoot = Math.floor(Math.cbrt(n));

    for(var i = 1; i<=cubeRoot; i++){
        arr.push(i*i*i);
    }

    var len = arr.length;
    var answer = []

    for(var i =0; i<len; i++){
        for(var j =i; j<len; j++){

            if(i!=j){

                if(object[arr[i]+arr[j]]){
                    if((arr[i]+arr[j])<n){
                        answer.push(arr[i]+arr[j])
                    }
                }
                else if((arr[i]+arr[j])<n){
                    object[arr[i]+arr[j]] = 1;
                }
            }
        }
    }
    return answer;

}

console.log(ramanujan(100000))

