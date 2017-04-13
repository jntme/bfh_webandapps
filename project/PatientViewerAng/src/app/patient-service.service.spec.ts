import { TestBed, inject } from '@angular/core/testing';

import { PatientService } from './patient.service';

describe('PatientServiceService', () => {
  beforeEach(() => {
    TestBed.configureTestingModule({
      providers: [PatientService]
    });
  });

  it('should ...', inject([PatientService], (service: PatientService) => {
    expect(service).toBeTruthy();
  }));
});
