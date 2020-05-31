@extends('frontend.app')

@include('frontend.menu')

<section>
    <div class="container emp-profile mt-4">
        <div class="row">
            <div class="col-md-12">
                <form action="{{ url('update_user_header/'.$user->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label>Name</label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" name="name"
                            value="{{ $user->name }}">
                        @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label>Email</label>
                        <input type="text" class="form-control" value="{{ $user->email }}" readonly>
                        <input type="hidden" class="form-control @error('email') is-invalid @enderror" name="email"
                            value="{{ $user->email }}">
                        @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="gender">Gender</label>
                        <select class="form-control @error('gender') is-invalid @enderror" name="gender">
                            <option>{{ $user->gender }}</option>
                            <option>Male</option>
                            <option>Female</option>
                        </select>
                        @error('gender')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label>Age</label>
                        <select class="form-control @error('age') is-invalid @enderror" name="age">
                            <option value="{{ $user->age }}">{{ $user->age }}</option>
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
                        @error('age')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label>Height</label>
                        <select class="form-control @error('height') is-invalid @enderror" name="height">
                            <option value="{{ $user->height }}">{{ $user->height }}</option>
                            <option value="4ft">4ft</option>
                            <option value="4ft 1in">4ft 1in</option>
                            <option value="4ft 2in">4ft 2in</option>
                            <option value="4ft 3in">4ft 3in</option>
                            <option value="4ft 4in">4ft 4in</option>
                            <option value="4ft 5in">4ft 5in</option>
                            <option value="4ft 6in">4ft 6in</option>
                            <option value="4ft 7in">4ft 7in</option>
                            <option value="4ft 8in">4ft 8in</option>
                            <option value="4ft 9in">4ft 9in</option>
                            <option value="4ft 10in">4ft 10in</option>
                            <option value="4ft 11in">4ft 11in</option>
                            <option value="5ft">5ft</option>
                            <option value="5ft 1in">5ft 1in</option>
                            <option value="5ft 2in">5ft 2in</option>
                            <option value="5ft 3in">5ft 3in</option>
                            <option value="5ft 4in">5ft 4in</option>
                            <option value="5ft 5in">5ft 5in</option>
                            <option value="5ft 6in">5ft 6in</option>
                            <option value="5ft 7in">5ft 7in</option>
                            <option value="5ft 8in">5ft 8in</option>
                            <option value="5ft 9in">5ft 9in</option>
                            <option value="5ft 10in">5ft 10in</option>
                            <option value="5ft 11in">5ft 11in</option>
                            <option value="6ft">6ft</option>
                            <option value="6ft 1in">6ft 1in</option>
                            <option value="6ft 2in">6ft 2in</option>
                            <option value="6ft 3in">6ft 3in</option>
                            <option value="6ft 4in">6ft 4in</option>
                            <option value="6ft 5in">6ft 5in</option>
                            <option value="6ft 6in">6ft 6in</option>
                            <option value="6ft 7in">6ft 7in</option>
                            <option value="6ft 8in">6ft 8in</option>
                            <option value="6ft 9in">6ft 9in</option>
                            <option value="6ft 10in">6ft 10in</option>
                            <option value="6ft 11in">6ft 11in</option>
                        </select>
                        @error('height')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label>Location</label>
                        <input type="text" class="form-control @error('location') is-invalid @enderror"
                            name="location" value="{{ $user->location }}">
                        @error('location')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="religion">Religion</label>
                        <select class="form-control @error('religion') is-invalid @enderror"
                            name="religion">
                            <option value="{{ $user->religion }}">{{ $user->religion }}</option>
                            <option value="Islam">Islam</option>
                            <option value="Hindu">Hindu</option>
                            <option value="Buddish">Buddish</option>
                            <option value="Christian">Christian</option>
                        </select>
                        @error('religion')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label>Mother Tongue</label>
                        <input type="text" class="form-control @error('mothertongue') is-invalid @enderror"
                            name="mothertongue" value="{{ $user->mothertongue }}">
                        @error('mothertongue')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="occupation">occupation</label>
                        <select class="form-control @error('occupation') is-invalid @enderror"
                            name="occupation">
                            <option value="{{ $user->occupation }}">{{ $user->occupation }}</option>
                            <optgroup label="Accounting, Banking &amp; Finance"></optgroup>
                            <option value="Accounting Professional">Accounting Professional</option>
                            <option value="Banking Professional">Banking Professional</option>
                            <option value="Chartered Accountant">Chartered Accountant</option>
                            <option value="Finance Professional">Finance Professional</option>
                            <option value="Investment Professional">Investment Professional</option>
                            <option value="Accounting &amp; Finance (Others)">Accounting &amp; Finance (Others)</option>

                            <optgroup label="Administration &amp; HR"></optgroup>
                            <option value="Admin Professional">Admin Professional</option>
                            <option value="Human Resources Professional">Human Resources Professional</option>

                            <optgroup label="Advertising, Media &amp; Entertainment"></optgroup>
                            <option value="Actor">Actor</option>
                            <option value="Advertising Professional">Advertising Professional</option>
                            <option value="Entertainment Professional">Entertainment Professional</option>
                            <option value="Event Manager">Event Manager</option>
                            <option value="Journalist">Journalist</option>
                            <option value="Media Professional">Media Professional</option>
                            <option value="Public Relations Professional">Public Relations Professional</option>

                            <optgroup label="Agriculture"></optgroup>
                            <option value="4#Agricultural Professional">Agricultural Professional</option>

                            <optgroup label="Airline &amp; Aviation"></optgroup>
                            <option value="Air Hostess / Flight Attendant">Air Hostess / Flight Attendant</option>
                            <option value="Pilot">Pilot</option>
                            <option value="Airline Professional">Airline Professional</option>

                            <optgroup label="Architecture &amp; Design"></optgroup>
                            <option value="Architect">Architect</option>
                            <option value="Interior Designer">Interior Designer</option>

                            <optgroup label="Artists &amp; Animators"></optgroup>
                            <option value="Animator">Animator</option>
                            <option value="Artist">Artist</option>

                            <optgroup label="Beauty &amp; Fashion"></optgroup>
                            <option value="Beautician">Beautician</option>
                            <option value="Fashion Designer">Fashion Designer</option>

                            <optgroup label="Defense"></optgroup>
                            <option value="Airforce">Airforce</option>
                            <option value="Army">Army</option>
                            <option value="Navy">Navy</option>
                            <option value="Defense Services (Others)">Defense Services (Others)</option>

                            <optgroup label="Education &amp; Training"></optgroup>
                            <option value="Lecturer">Lecturer</option>
                            <option value="Professor">Professor</option>
                            <option value="Teacher">Teacher</option>

                            <optgroup label="Engineering"></optgroup>
                            <option value="Civil Engineer">Civil Engineer</option>
                            <option value="Electronics / Telecom Engineer">Electronics / Telecom Engineer</option>
                            <option value="Mechanical / Production Engineer">Mechanical / Production Engineer</option>
                            <option value="Engineer (Non IT)">Engineer (Non IT)</option>

                            <optgroup label="IT &amp; Software Engineering"></optgroup>
                            <option value="Software Engineer / Programmer">Software Engineer / Programmer</option>
                            <option value="Software Consultant">Software Consultant</option>
                            <option value="Hardware &amp; Networking professional">Hardware &amp; Networking
                                professional</option>
                            <option value="Database Administrator">Database Administrator</option>
                            <option value="Web / UX Designers / Graphics Designers">Web / UX Designers / Graphics
                                Designers</option>
                            <option value="Computer Operator">Computer Operator</option>
                            <option value="Computers / IT">Computers / IT</option>
                            <option value="Software Professional (Others)">Software Professional (Others)</option>

                            <optgroup label="Legal"></optgroup>
                            <option value="Lawyer">Lawyer</option>
                            <option value="Legal Assistant">Legal Assistant</option>
                            <option value="Legal Professional (Others)">Legal Professional (Others)</option>

                            <optgroup label="Medical &amp; Healthcare"></optgroup>
                            <option value="Doctor">Doctor</option>
                            <option value="Dentist">Dentist</option>
                            <option value="Nurse">Nurse</option>
                            <option value="Pharmacist">Pharmacist</option>
                            <option value="Psychologist">Psychologist</option>
                            <option value="Therapist">Therapist</option>
                            <option value="Medical / Healthcare Professional">Medical / Healthcare Professional</option>

                            <optgroup label="Sales &amp; Marketing"></optgroup>
                            <option value="Marketing Professional">Marketing Professional</option>
                            <option value="Sales Professional">Sales Professional</option>

                            <optgroup label="Business &amp; Others"></optgroup>
                            <option value="Business Owner / Entrepreneur">Business Owner / Entrepreneur</option>
                            <option value="Consultant / Supervisor">Consultant / Supervisor</option>
                            <option value="Politician">Politician</option>
                            <option value="Sportsman">Sportsman</option>
                            <option value="Travel &amp; Transport Professional">Travel &amp; Transport Professional
                            </option>
                            <option value="Writer">Writer</option>
                            <option value="Not Defined">Not Defined</option>

                            <optgroup label="Not Working"></optgroup>
                            <option value="Student">Student</option>
                            <option value="Not Working">Not Working</option>
                        </select>
                        @error('occupation')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label>Marital Status</label>
                        <input type="text" class="form-control @error('maritalstatus') is-invalid @enderror"
                            name="maritalstatus" value="{{ $user->maritalstatus }}">
                        @error('maritalstatus')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>


                    <div class="form-group">
                        <label for="avatar" class="col-md-4 col-form-label">Image</label>
                        <div class="col-md-6">
                            <input type="file" class="form-control @error('avatar') is-invalid @enderror" value="{{ $user->avatar }}" name="avatar">
                            <p>Present Photo</p>
                            <img height="80px" width="80px" src="{{ $user->avatar }}" alt="">
                            @error('avatar')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>

                    <button type="submit" class="btn btn-primary mb-5">Submit</button>
                </form>
            </div>
        </div>
    </div>
</section>


