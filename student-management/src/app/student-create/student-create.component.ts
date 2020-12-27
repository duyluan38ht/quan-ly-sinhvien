import { Component, OnInit } from '@angular/core';
import { Router } from '@angular/router';
import { NotificationService } from '../notification.service';
import { StudentService } from '../services/student.service';
import { Student } from '../Student';

@Component({
  selector: 'app-student-create',
  templateUrl: './student-create.component.html',
  styleUrls: ['./student-create.component.css']
})
export class StudentCreateComponent implements OnInit {

  student: Student = new Student();
  submitted = false;

  constructor(private studentService: StudentService,
    private router: Router, private notifyService: NotificationService) { }

  showToasterSuccess(){
      this.notifyService.showSuccess("Student created successfully !!", "Success")
      console.log(1)
  }
  
  showToasterError(){
      this.notifyService.showError("Something is wrong", "Failed")
  }
  
  showToasterInfo(){
      this.notifyService.showInfo("This is info", "ItSolutionStuff.com")
  }
  
  showToasterWarning(){
      this.notifyService.showWarning("This is warning", "ItSolutionStuff.com")
  }
    
  ngOnInit() {
  }

  newStudent(): void {
    this.submitted = false;
    this.student = new Student();
  }

  save() {
    this.studentService.createStudent(this.student).subscribe((data: any) => {
        console.log(data)
        this.student = new Student();
        this.gotoList();
      },
        (error: any) => console.log(error));
  }

  onSubmit() {
    this.submitted = true;
    this.save();
    this.showToasterSuccess();
  }

  gotoList() {
    this.router.navigate(['/students']);
  }


}
