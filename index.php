<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Application Form</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="style.css">
</head>
<body>
       <header>
         <nav class="navigation">
            <div class="nav-id">
                <h3>Applicant ID: </h3>
            </div>
            <div class="nav-btn">
            <button class="btn-logout">
                    <i class="fas fa-logout"></i><a href="login.php">Logout</a>
                </button>
            </div>
         </nav>
       </header>
       
    <div class="container">
        <div class="header">
            <h1>Student Application Form</h1>
            <!-- <h2>Lyceum Of Alabang</h2> -->
            <p>Please fill out all required fields to complete your application</p>
        </div>

        <form id="studentApplicationForm" class="form-container">
            <div class="form-section">
                <h2 class="section-title">
                    <i class="fas fa-user-graduate"></i> Personal Information
                </h2>
                
                <div class="photo-upload">
                    <div class="photo-preview" id="photoPreview">
                        <i class="fas fa-user" style="font-size: 3rem; color: #64748b;"></i>
                    </div>
                    <div class="photo-upload-controls">
                        <label for="studentPhoto" class="photo-upload-btn">
                            <i class="fas fa-upload"></i> Upload Photo
                        </label>
                        <input type="file" id="studentPhoto" name="studentPhoto" accept="image/*">
                        <p class="photo-upload-note">JPEG or PNG, max 2MB. White background preferred.</p>
                    </div>
                </div>
                
                <div class="form-row">
                    <div class="form-group">
                        <label for="firstName" class="form-label required">First Name</label>
                        <input type="text" id="firstName" name="firstName" class="form-control" required>
                        <div class="error-message" id="firstNameError">Please enter your first name</div>
                    </div>
                    <div class="form-group">
                        <label for="lastName" class="form-label required">Last Name</label>
                        <input type="text" id="lastName" name="lastName" class="form-control" required>
                        <div class="error-message" id="lastNameError">Please enter your last name</div>
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group">
                        <label for="middleName" class="form-label">Middle Name</label>
                        <input type="text" id="middleName" name="middleName" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="gender" class="form-label required">Gender</label>
                        <select id="gender" name="gender" class="form-control" required>
                            <option value="">Select Gender</option>
                            <option value="Male">Male</option>
                            <option value="Female">Female</option>
                            <option value="Other">Other</option>
                        </select>
                        <div class="error-message" id="genderError">Please select your gender</div>
                    </div>
                </div>
                    
                 <div class="form-row">
                    <div class="form-group">
                        <label for="dob" class="form-label required">Age</label>
                        <input type="number" id="Age" name="Age" class="form-control" required>
                        <div class="error-message" id="dobError">Please enter your date of birth</div>
                    </div>
                    <div class="form-group">
                        <label for="Height" class="form-label required">Height(cm)</label>
                        <input type="text" id="Height" name="Height" class="form-control" required>
                        <div class="error-message" id="nationalityError">Please enter your nationality</div>
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group">
                        <label for="dob" class="form-label required">Date of Birth</label>
                        <input type="date" id="dob" name="dob" class="form-control" required>
                        <div class="error-message" id="dobError">Please enter your date of birth</div>
                    </div>
                    <div class="form-group">
                        <label for="nationality" class="form-label required">Nationality</label>
                        <input type="text" id="nationality" name="nationality" class="form-control" required>
                        <div class="error-message" id="nationalityError">Please enter your nationality</div>
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group">
                        <label for="idNumber" class="form-label required">Religion</label>
                        <input type="text" id="idNumber" name="idNumber" class="form-control" required>
                        <div class="error-message" id="idNumberError">Please enter your ID number</div>
                    </div>
                    <div class="form-group">
                        <label for="bloodType" class="form-label">Civil Status</label>
                        <select id="bloodType" name="bloodType" class="form-control">
                            <option value="">Select Status</option>
                            <option value="single">Single</option>
                            <option value="married">Married</option>
                            <option value="divored">Divorced</option>
                        </select>
                    </div>
                </div>
            </div>

            <!-- Contact Information Section -->
            <div class="form-section">
                <h2 class="section-title">
                    <i class="fas fa-address-book"></i> Contact Information
                </h2>
                
                <div class="form-row">
                    <div class="form-group">
                        <label for="email" class="form-label required">Email Address</label>
                        <input type="email" id="email" name="email" class="form-control" required>
                        <div class="error-message" id="emailError">Please enter a valid email address</div>
                    </div>
                    <div class="form-group">
                        <label for="phone" class="form-label required">Phone Number</label>
                        <input type="tel" id="phone" name="phone" class="form-control" required>
                        <div class="error-message" id="phoneError">Please enter your phone number</div>
                    </div>
                </div>

                <div class="form-group">
                    <label for="address" class="form-label required">Permanent Address</label>
                    <textarea id="address" name="address" class="form-control" rows="3" required></textarea>
                    <div class="error-message" id="addressError">Please enter your address</div>
                </div>

                <!-- <h3 style="margin: 1.5rem 0 1rem; color: var(--primary);">Emergency Contact</h3>
                
                <div class="form-row">
                    <div class="form-group">
                        <label for="emergencyName" class="form-label required">Full Name</label>
                        <input type="text" id="emergencyName" name="emergencyName" class="form-control" required>
                        <div class="error-message" id="emergencyNameError">Please enter emergency contact name</div>
                    </div>
                    <div class="form-group">
                        <label for="emergencyRelation" class="form-label required">Relationship</label>
                        <input type="text" id="emergencyRelation" name="emergencyRelation" class="form-control" required>
                        <div class="error-message" id="emergencyRelationError">Please specify relationship</div>
                    </div>
                </div> -->

                <div class="form-row">
                    <div class="form-group">
                        <label for="emergencyPhone" class="form-label required">Phone Number</label>
                        <input type="tel" id="emergencyPhone" name="emergencyPhone" class="form-control" required>
                        <div class="error-message" id="emergencyPhoneError">Please enter emergency phone number</div>
                    </div>
                    <div class="form-group">
                        <label for="emergencyEmail" class="form-label">Email</label>
                        <input type="email" id="emergencyEmail" name="emergencyEmail" class="form-control">
                    </div>
                </div>
            </div>

            <!-- Academic Information Section -->
            <div class="form-section">
                <h2 class="section-title">
                    <i class="fas fa-graduation-cap"></i> Academic Information
                </h2>
                
                <div class="form-row">
                    <div class="form-group">
                        <label for="campus" class="form-label required">Preferred Campus</label>
                        <select id="campus" name="campus" class="form-control" required>
                            <option value="">Select Campus</option>
                            <option value="Main Campus">Main Campus</option>
                            <option value="North Campus">North Campus</option>
                            <option value="South Campus">South Campus</option>
                        </select>
                        <div class="error-message" id="campusError">Please select your preferred campus</div>
                    </div>
                    <div class="form-group">
                        <label for="department" class="form-label required">Department</label>
                        <select id="department" name="department" class="form-control" required>
                            <option value="">Select Department</option>
                            <option value="College">College</option>
                            <option value="Senior High">Senior High</option>
                            <option value="Junior High">Junior High</option>
                            <option value="Elementary">Elementary</option>
                            <option value="kinder Garden">Kindergarten</option>   
                        </select>
                        <div class="error-message" id="departmentError">Please select your department</div>
                    </div>
                </div>

                 <div class="form-section">
                    <h2 class="section-title">
                        <i class="fas fa-user-shield"></i> Guardian Information
                    </h2>
                    
                
                    <div class="form-row">
                        <div class="form-group">
                            <label for="guardianFirstName" class="required">First Name</label>
                            <input type="text" id="guardianFirstName" name="guardianFirstName" required>
                        </div>
                        
                        <div class="form-group">
                            <label for="guardianMiddleName">Middle Name</label>
                            <input type="text" id="guardianMiddleName" name="guardianMiddleName">
                        </div>
                        
                        <div class="form-group">
                            <label for="guardianLastName" class="required">Last Name</label>
                            <input type="text" id="guardianLastName" name="guardianLastName" required>
                        </div>
                    </div>
                    
                    <div class="form-row">
                        <div class="form-group">
                            <label for="guardianRelationship" class="required">Relationship to Child</label>
                            <select id="guardianRelationship" name="guardianRelationship" required>
                                <option value="">Select Relationship</option>
                                <option value="grandparent">Grandparent</option>
                                <option value="aunt/uncle">Aunt/Uncle</option>
                                <option value="sibling">Sibling</option>
                                <option value="family_friend">Family Friend</option>
                                <option value="other">Other</option>
                            </select>
                        </div>
                        
                        <div class="form-group">
                            <label for="guardianDob" class="required">Date of Birth</label>
                            <input type="date" id="guardianDob" name="guardianDob" required>
                        </div>
                    </div>
                    
                    <div class="form-row">
                        <div class="form-group">
                            <label for="guardianOccupation">Occupation</label>
                            <input type="text" id="guardianOccupation" name="guardianOccupation">
                        </div>
                        
                        <div class="form-group">
                            <label for="guardianEmployer">Employer/Business Name</label>
                            <input type="text" id="guardianEmployer" name="guardianEmployer">
                        </div>
                    </div>
                    
                    <div class="form-row">
                        <div class="form-group">
                            <label for="guardianEmail">Email Address</label>
                            <input type="email" id="guardianEmail" name="guardianEmail">
                        </div>
                        
                        <div class="form-group">
                            <label for="guardianPhone" class="required">Phone Number</label>
                            <input type="tel" id="guardianPhone" name="guardianPhone" required>
                        </div>
                    </div>
                    
                    <div class="form-row">
                        <div class="form-group">
                            <label for="guardianAddress" class="required">Complete Address</label>
                            <textarea id="guardianAddress" name="guardianAddress" rows="3" required></textarea>
                            <!-- <p class="form-note">If same as parents, please indicate "Same as father/mother"</p> -->
                        </div>
                    </div>
                </div>
                
                <div class="btn-container">
                    <!-- <a href="index.html">Previous Step</a> -->
                    <button type="submit" class="btn"><i class="fas fa-paper-plane"></i>Submit</button>
                </div>
                
            </form>
        </div>
    </div>

</body>
</html>