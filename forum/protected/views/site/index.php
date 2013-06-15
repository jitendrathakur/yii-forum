<?php
/* @var $this SiteController */

$this->pageTitle=Yii::app()->name;
?>

<!-- Pygments code -->
<div class="highlight">
	<pre>
		<span class="kd">var</span>
		<span class="nx">flatiron</span>
		<span class="o">=</span>
		<span class="nx">require</span>
		<span class="p">(</span>
		<span class="s1">&#39;flatiron&#39;</span>
		<span class="p">),</span>
	    <span class="nx">app</span>
	    <span class="o">=</span>
	    <span class="nx">flatiron</span>
	    <span class="p">.</span>
	    <span class="nx">app</span>
	    <span class="p">;</span>
		<span class="nx">app</span>
		<span class="p">.</span>
		<span class="nx">use</span>
		<span class="p">(</span>
		<span class="nx">flatiron</span>
		<span class="p">.</span>
		<span class="nx">plugins</span>
		<span class="p">.</span>
		<span class="nx">http</span>
		<span class="p">,</span>
		<span class="p">{</span>
		<span class="c1">//</span>
		<span class="c1">// List of middleware to use before dispatching to app.router</span>
		<span class="c1">//</span>
		<span class="nx">before</span>
		<span class="o">:</span> 
		<span class="p">[],</span>
		<span class="c1">//</span>
		<span class="c1">// List of Streams to execute on the response pipeline</span>
		<span class="c1">//</span>
		<span class="nx">after</span>
		<span class="o">:</span> 
		<span class="p">[]</span>
		<span class="p">});</span>
		<span class="nx">app</span>
		<span class="p">.</span>
		<span class="nx">listen</span>
		<span class="p">(</span>
		<span class="mi">8000</span>
		<span class="p">,</span>
		<span class="kd">function</span>
		<span class="p">()</span>
		<span class="p">{</span>
	  	<span class="nx">console</span>
	  	<span class="p">.</span>
	  	<span class="nx">log</span>
	  	<span class="p">(</span>
	  	<span class="s1">&#39;Application is now started on port 8000&#39;</span>
	  	<span class="p">);</span>
		<span class="p">});</span>
	</pre>
</div>
<!-- Pygments code -->
<h3>How does it work?</h3>

<!-- Pygments code -->
<div class="highlight">
	<pre>
		<span class="c1">//</span>
		<span class="c1">// for the sake of this example, lets define a function to represent our</span>
		<span class="c1">// middleware. Your middleware would likely be a more complex module.</span>
		<span class="c1">//</span>
		<span class="kd">function</span>
		<span class="nx">middleware1</span>
		<span class="p">(</span>
		<span class="nx">req</span>
		<span class="p">,</span> 
		<span class="nx">res</span>
		<span class="p">)</span> 
		<span class="p">{</span>
		<span class="k">if</span>
		<span class="p">(</span>
		<span class="o">~</span>
		<span class="nx">req</span>
		<span class="p">.</span>
		<span class="nx">url</span>
		<span class="p">.</span>
		<span class="nx">indexOf</span>
		<span class="p">(</span>
		<span class="s1">&#39;foo&#39;</span>
		<span class="p">))</span> 
		<span class="p">{</span>
		<span class="k">return</span> 
		<span class="kc">false</span>
		<span class="p">;</span>
		<span class="p">}</span>
		<span class="p">}</span>
		<span class="kd">var</span> 
		<span class="nx">server</span> 
		<span class="o">=</span> 
		<span class="nx">union</span>
		<span class="p">.</span>
		<span class="nx">createServer</span>
		<span class="p">({</span>
		<span class="nx">before</span>
		<span class="o">:</span> 
		<span class="p">[</span>
		<span class="nx">middleware1</span>
		<span class="p">]</span>
		<span class="p">});</span>
		<span class="nx">router</span>
		<span class="p">.</span>
		<span class="nx">get</span>
		<span class="p">(</span>
		<span class="sr">/foo/</span>
		<span class="p">,</span> 
		<span class="kd">function</span> 
		<span class="p">()</span> 
		<span class="p">{</span>
		<span class="k">this</span>
		<span class="p">.</span>
		<span class="nx">res</span>
		<span class="p">.</span>
		<span class="nx">writeHead</span>
		<span class="p">(</span>
		<span class="mi">200</span>
		<span class="p">,</span> 
		<span class="p">{</span> 
		<span class="s1">&#39;Content-Type&#39;</span>
		<span class="o">:</span> 
		<span class="s1">&#39;text/plain&#39;</span> 
		<span class="p">});</span>
		<span class="k">this</span>
		<span class="p">.</span>
		<span class="nx">res</span>
		<span class="p">.</span>
		<span class="nx">end</span>
		<span class="p">(</span>
		<span class="s1">&#39;never sent\n&#39;</span>
		<span class="p">);</span>
		<span class="p">});</span>
	</pre>
</div>
<!-- Pygments code -->
