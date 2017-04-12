import { PatientViewerAngPage } from './app.po';

describe('patient-viewer-ang App', () => {
  let page: PatientViewerAngPage;

  beforeEach(() => {
    page = new PatientViewerAngPage();
  });

  it('should display message saying app works', () => {
    page.navigateTo();
    expect(page.getParagraphText()).toEqual('app works!');
  });
});
