import { Component, OnInit } from '@angular/core';
import { Router } from '@angular/router';
import { Observable } from 'rxjs';
import { NotificationService } from '../notification.service';
import { StudentService } from '../services/student.service';
import { Student } from '../Student';

@Component({
  selector: 'app-student-list',
  templateUrl: './student-list.component.html',
  styleUrls: ['./student-list.component.css']
})
export class StudentListComponent implements OnInit {

  students!: Observable<Student[]>;
  name!: string;

  constructor(private studentService: StudentService,
    private router: Router, private notifyService: NotificationService) {}

  ngOnInit() {
    this.reloadData();
  }

  reloadData() {
    this.students = this.studentService.getStudentsList();
  }
  deleteStudent(id: number) {
    this.studentService.deleteStudent(id)
      .subscribe(
        data => {
          console.log(data);
          this.reloadData();
          this.showToasterSuccess();
        },
        error => console.log(error));
  }

  studentDetails(id: number){
    this.router.navigate(['details', id]);
  }

  updateStudent(id: number){
    this.router.navigate(['update', id])
  }

  getStudentsByName() {
    console.log('here');
    this.students = this.studentService.getStudentsByName(this.name);
  }

  showToasterSuccess(){
    this.notifyService.showSuccess("Student deleted successfully !!", "Success")
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
