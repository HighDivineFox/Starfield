<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Starfield</title>
        <link rel="stylesheet" href="..\..\CSS\css.css"></link>
    </head>
    <style>
        canvas{
            border: 1px solid black;
            margin: 10px;
        }

        body{
            margin : 0;
        }

    </style>
    <body>
        <h1>
            Starfield
        </h1>
        <div>
            <?php include '..\..\menu.php'; ?>
        </div>
        <canvas>

        </canvas>
        <script src="canvas.js"></script>

        <div class="review">
            <h2>Code Review</h2>
            <h3>Sources:<br /><a href="https://www.youtube.com/watch?v=17WoOqgXsRM">Coding Challenge #1: Starfield</a></h3>
            <div class="explanation">
                <h3>Concepts:</h3>
                <h4>Translating the canvas</h4>

<pre style="color:#000000;background:#ffffff;">context<span style="color:#808030; ">.</span>translate<span style="color:#808030; ">(</span>XValue<span style="color:#808030; ">,</span> YValue<span style="color:#808030; ">)</span><span style="color:#800080; ">;</span>
</pre>
                Moves the centre point of the canvas to the specified position

                <h4>Event Listening</h4>

<pre style="color:#000000;background:#ffffff;">canvas<span style="color:#808030; ">.</span>addEventListener<span style="color:#808030; ">(</span><span style="color:#800000; ">"</span><span style="color:#0000e6; ">mousedown</span><span style="color:#800000; ">"</span><span style="color:#808030; ">,</span> functionName<span style="color:#808030; ">,</span> <span style="color:#0f4d75; ">false</span><span style="color:#808030; ">)</span><span style="color:#800080; ">;</span>
canvas<span style="color:#808030; ">.</span>addEventListener<span style="color:#808030; ">(</span><span style="color:#800000; ">"</span><span style="color:#0000e6; ">mouseup</span><span style="color:#800000; ">"</span><span style="color:#808030; ">,</span> functionName<span style="color:#808030; ">,</span> <span style="color:#0f4d75; ">false</span><span style="color:#808030; ">)</span><span style="color:#800080; ">;</span>
</pre>

                <h4>Remapping Values</h4>
                <pre style='color:#000000;background:#ffffff;'><span style='color:#800000; font-weight:bold; '>function</span> remap<span style='color:#808030; '>(</span>value<span style='color:#808030; '>,</span> low1<span style='color:#808030; '>,</span> high1<span style='color:#808030; '>,</span> low2<span style='color:#808030; '>,</span> high2<span style='color:#808030; '>)</span><span style='color:#800080; '>{</span>
    <span style='color:#800000; font-weight:bold; '>return</span> low2 <span style='color:#808030; '>+</span> <span style='color:#808030; '>(</span>value <span style='color:#808030; '>-</span> low1<span style='color:#808030; '>)</span> <span style='color:#808030; '>*</span> <span style='color:#808030; '>(</span>high2 <span style='color:#808030; '>-</span> low2<span style='color:#808030; '>)</span> <span style='color:#808030; '>/</span> <span style='color:#808030; '>(</span>high1 <span style='color:#808030; '>-</span> low1<span style='color:#808030; '>)</span><span style='color:#800080; '>;</span>
<span style='color:#800080; '>}</span>
</pre>
<!--Created using ToHtml.com on 2019-01-05 06:55:55 UTC -->
                When the star class is instantiated, we also generate a random Z value between 0 and the canvas width. The canvas is just a 2d plane so this Z value is only used to calculate the display position and size of the star.<br />
                During the update function, the SX (the shown position) variable is remapped between 0 and the canvas width so that when Z is changed by the speed, it changes the position of the star.

                <pre style="color:#000000;background:#ffffff;"><span style="color:#800000; font-weight:bold; ">this</span><span style="color:#808030; ">.</span>sx <span style="color:#808030; ">=</span> remap<span style="color:#808030; ">(</span><span style="color:#800000; font-weight:bold; ">this</span><span style="color:#808030; ">.</span>x <span style="color:#808030; ">/</span> <span style="color:#800000; font-weight:bold; ">this</span><span style="color:#808030; ">.</span>z<span style="color:#808030; ">,</span> <span style="color:#008c00; ">0</span><span style="color:#808030; ">,</span> <span style="color:#008c00; ">1</span><span style="color:#808030; ">,</span> <span style="color:#008c00; ">0</span><span style="color:#808030; ">,</span> canvas<span style="color:#808030; ">.</span>width<span style="color:#808030; ">)</span>
</pre>
                    
                The radius is also remapped based on the Z value. Because we a reducing the value of Z, the low2 value is higher than high2.
                
<pre style="color:#000000;background:#ffffff;"><span style="color:#800000; font-weight:bold; ">this</span><span style="color:#808030; ">.</span>radius <span style="color:#808030; ">=</span> remap<span style="color:#808030; ">(</span><span style="color:#800000; font-weight:bold; ">this</span><span style="color:#808030; ">.</span>z<span style="color:#808030; ">,</span> <span style="color:#008c00; ">0</span><span style="color:#808030; ">,</span> canvas<span style="color:#808030; ">.</span>width<span style="color:#808030; ">,</span> <span style="color:#008c00; ">4</span><span style="color:#808030; ">,</span> <span style="color:#008c00; ">0</span><span style="color:#808030; ">)</span><span style="color:#800080; ">;</span>
</pre>

            </div>
        </div>

    </body>
</html>