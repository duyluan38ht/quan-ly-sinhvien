import { Component, OnInit } from '@angular/core';
import { ActivatedRoute, Router } from '@angular/router';
import { NotificationService } from '../notification.service';
import { StudentService } from '../services/student.service';
import { Student } from '../Student';

@Component({
  selector: 'app-update-student',
  templateUrl: './update-student.component.html',
  styleUrls: ['./update-student.component.css']
})
export class UpdateStudentComponent implements OnInit {
  id!: number;
  student!: Student;
  public submitted: boolean | undefined;

  constructor(private route: ActivatedRoute, private router: Router,
    private studentService: StudentService, private notifyService: NotificationService) { }

  ngOnInit() {
    this.student = new Student();

    this.id = this.route.snapshot.params['id'];

    this.studentService.getStudent(this.id)
      .subscribe(data => {
        console.log(data)
        this.student = data;
      }, error => console.log(error));
  }

  updateStudent() {
    this.studentService.updateStudent(this.id, this.student)
      .subscribe(data => {
        console.log(data);
        this.student = new Student();
        this.gotoList();
        this.showToasterSuccess();
      }, error => console.log(error));
  }

  onSubmit() {
    this.updateStudent();
  }

  gotoList() {
    this.router.navigate(['/students']);
  }

  showToasterSuccess(){
    this.notifyService.showSuccess("Student updated successfully !!", "Success")
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

}
