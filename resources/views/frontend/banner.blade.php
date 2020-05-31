<!-- Banner Part Start -->
<section id="banner">
  <div class="container banner-contents">
    <div class="row">
      <div class="col-lg-10 mx-auto">
        <div class="banner-content">
          <h2 class="text-center">Find your perfect life partner</h2>
        </div>
        <div class="banner-content-search">
            <form action="{{ route('find-person') }}" method="POST">
                @csrf
             <div class="row">
               <div class="col-lg-2">
                <label for="inputState">Looking For</label>
                <select id="inputState" name="gender" class="form-control">
                  <option></option>
                  <option value="Male">Male</option>
                  <option value="Female">Female</option>
                </select>
               </div>
               <div class="col-lg-2">
                <label for="inputState2">Age From</label>
                <select id="inputState2" name="ageFrom" class="form-control">
                  <option></option>
                  <option value="18">18</option>
                  <option value="19">19</option>
                  <option value="20">20</option>
                  <option value="21">21</option>
                  <option value="22">22</option>
                  <option value="23">23</option>
                  <option value="24">24</option>
                  <option value="25">25</option>
                  <option value="26">26</option>
                  <option value="27">27</option>
                  <option value="28">28</option>
                  <option value="29">29</option>
                  <option value="30">30</option>
                  <option value="31">31</option>
                  <option value="32">32</option>
                  <option value="33">33</option>
                  <option value="34">34</option>
                  <option value="35">35</option>
                  <option value="36">36</option>
                  <option value="37">37</option>
                  <option value="38">38</option>
                  <option value="39">39</option>
                  <option value="40">40</option>
                  <option value="41">41</option>
                  <option value="42">42</option>
                  <option value="43">43</option>
                  <option value="44">44</option>
                  <option value="45">45</option>
                  <option value="46">46</option>
                  <option value="47">47</option>
                  <option value="48">48</option>
                  <option value="49">49</option>
                  <option value="50">50</option>
                  <option value="51">51</option>
                  <option value="52">52</option>
                  <option value="53">53</option>
                  <option value="54">54</option>
                  <option value="55">55</option>
                  <option value="56">56</option>
                  <option value="57">57</option>
                  <option value="58">58</option>
                  <option value="59">59</option>
                  <option value="60">60</option>
                </select>
               </div>

               <div class="col-lg-2">
                <label for="inputState3">To</label>
                <select id="inputState3" name="ageTo" class="form-control">
                      <option></option>
                      <option value="20">20</option>
                      <option value="21">21</option>
                      <option value="22">22</option>
                      <option value="23">23</option>
                      <option value="24">24</option>
                      <option value="25">25</option>
                      <option value="26">26</option>
                      <option value="27">27</option>
                      <option value="28">28</option>
                      <option value="29">29</option>
                      <option value="30">30</option>
                      <option value="31">31</option>
                      <option value="32">32</option>
                      <option value="33">33</option>
                      <option value="34">34</option>
                      <option value="35">35</option>
                      <option value="36">36</option>
                      <option value="37">37</option>
                      <option value="38">38</option>
                      <option value="39">39</option>
                      <option value="40">40</option>
                      <option value="41">41</option>
                      <option value="42">42</option>
                      <option value="43">43</option>
                      <option value="44">44</option>
                      <option value="45">45</option>
                      <option value="46">46</option>
                      <option value="47">47</option>
                      <option value="48">48</option>
                      <option value="49">49</option>
                      <option value="50">50</option>
                      <option value="51">51</option>
                      <option value="52">52</option>
                      <option value="53">53</option>
                      <option value="54">54</option>
                      <option value="55">55</option>
                      <option value="56">56</option>
                      <option value="57">57</option>
                      <option value="58">58</option>
                      <option value="59">59</option>
                      <option value="60">60</option>
                </select>
               </div>
               <div class="col-lg-2">
                <label for="inputState4">Religion</label>
                <select id="inputState4" name="religion" class="form-control">
                  <option></option>
                  <option value="Islam">Islam</option>
                  <option value="Hindu">Hindu</option>
                  <option value="Buddish">Buddish</option>
                  <option value="Christian">Christian</option>
                </select>
               </div>
               <div class="col-lg-2">
                <label for="inputState5">Country</label>
                <select id="inputState5" name="country" class="form-control">
                  <option></option>
                  <option value="Pakistan">Pakistan</option>
                  <option value="Bangladesh">Bangladesh</option>
                  <option value="India">India</option>
                  <option value="USA">USA</option>
                  <option value="Canada">Canada</option>
                </select>
               </div>
               <div class="col-lg-2">
                <div class="search-btn">
                  <button type="submit" class="btn btn-primary">Search</button>
                </div>
               </div>
             </div>

            </form>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- Banner Part End -->




