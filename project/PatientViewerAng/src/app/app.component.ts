import { Component, OnInit } from '@angular/core';
import { Patient } from './patient';
import { PatientService } from "app/patient.service";

@Component({
  moduleId: module.id,
  selector: 'my-app',
  templateUrl: './app.component.html',
  styleUrls: ['./app.component.css'],
  providers: [PatientService]
})
export class AppComponent implements OnInit {

  title = 'PatientViewer';

  ngOnInit(): void {}
}


