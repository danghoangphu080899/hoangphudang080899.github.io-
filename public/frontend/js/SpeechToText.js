var message = document.querySelector('#key-word');

        var SpeechRecognition = SpeechRecognition || webkitSpeechRecognition;
        var SpeechGrammarList = SpeechGrammarList || webkitSpeechGrammarList;

        var grammar = '#JSGF V1.0;'

        var recognition = new SpeechRecognition();
        var speechRecognitionList = new SpeechGrammarList();
        speechRecognitionList.addFromString(grammar, 1);
        recognition.grammars = speechRecognitionList;
        recognition.lang = 'vi-VN';
        recognition.interimResults = false;

        recognition.onresult = function(event) {
            var last = event.results.length - 1;
            var command = event.results[last][0].transcript;
            
            console.log(command);

            if(command.toLowerCase().endsWith("tìm kiếm")){
              var key = command.search("tìm kiếm")-1;
              document.getElementById("key-word").value = command.substring(0, key);

                // document.getElementById("key").value = command.substring(0, key);
               document.getElementById("form-search").submit();
                 

            }else{

              document.getElementById("key-word").value = command;
               // document.getElementById("key").value = command;
            }
        };

        recognition.onspeechend = function() {
            recognition.stop();
        };

        recognition.onerror = function(event) {
            alert('Loi : ' + event.error);
        }        

        document.querySelector('#mic').addEventListener('click', function(){
            recognition.start();
        }
        

);




var message2 = document.querySelector('#key');

        var SpeechRecognition2 = SpeechRecognition || webkitSpeechRecognition;
        var SpeechGrammarList2 = SpeechGrammarList || webkitSpeechGrammarList;

        var grammar2 = '#JSGF V1.0;'

        var recognition2 = new SpeechRecognition2();
        var speechRecognitionList2 = new SpeechGrammarList2();
        speechRecognitionList2.addFromString(grammar2, 1);
        recognition2.grammars = speechRecognitionList2;
        recognition2.lang = 'vi-VN';
        recognition2.interimResults = false;

        recognition2.onresult = function(event) {
            var last = event.results.length - 1;
            var command = event.results[last][0].transcript;
            
            console.log(command);

            if(command.toLowerCase().trim().endsWith("tìm kiếm")){
              var key = command.search("tìm kiếm")-1;

                document.getElementById("key").value = command.substring(0, key);
               document.getElementById("form-search2").submit();
                 

            }else{

             
                document.getElementById("key").value = command;
            }
        };

        recognition2.onspeechend = function() {
            recognition2.stop();
        };

        recognition2.onerror = function(event) {
            alert('Loi : ' + event.error);
        }        

        document.querySelector('#mic2').addEventListener('click', function(){
            recognition2.start();
        }
        

);
            

            
