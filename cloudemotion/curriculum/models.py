from django.db import models
from django.conf import settings

# Create your models here.


class Companies(models.Model):
    name = models.CharField(max_length=50)
    phone = models.CharField(max_length=50)
    email = models.EmailField(max_length=50)
    address = models.TextField()
    responsable = models.CharField(max_length=100)
    responsible_phone = models.CharField(max_length=50)
    status = models.BooleanField(default=True)
    create_at = models.DateTimeField(auto_now_add=True)

    class Meta:
        app_label = 'curriculum'
        db_table = 'companies'

    def __str__(self):
        return self.name


class Experiences(models.Model):
    user = models.ForeignKey(
       settings.AUTH_USER_MODEL,
       on_delete=models.CASCADE,
       related_name='ex_user')
    company = models.ForeignKey(
        Companies, related_name='company_experience')
    position = models.ForeignKey('common.Positions')
    start_date = models.DateField()
    ending_date = models.DateField()
    title = models.TextField()
    description = models.TextField()
    status = models.BooleanField(default=True)
    create_at = models.DateTimeField(auto_now_add=True)

    class Meta:
        app_label = 'curriculum'
        db_table = 'experiences'

    def __str__(self):
        return self.company.name+ "/" +self.position.name


class Institutes(models.Model):
    name = models.CharField(max_length=100)
    address = models.TextField()
    status = models.BooleanField(default=True)
    create_at = models.DateTimeField(auto_now_add=True)

    class Meta:
        app_label = 'curriculum'
        db_table = 'institutes'

    def __str__(self):
        return self.name


class Educations(models.Model):
    name = models.CharField(max_length=100)
    status = models.BooleanField(default=True)
    create_at = models.DateTimeField(auto_now_add=True)

    class Meta:
        app_label = 'curriculum'
        db_table = 'educations'

    def __str__(self):
        return self.name


class EducationsUser(models.Model):
    __types = (
       (1, "Basic"),
       (2, "diversified"),
       (3, "Academic"),
    )
    user = models.ForeignKey(
       settings.AUTH_USER_MODEL,
       on_delete=models.CASCADE,
       related_name='edu_user')
    type_educations = models.SmallIntegerField(
       default=1, choices=__types)
    institute = models.ForeignKey(Institutes)
    education = models.ForeignKey(Educations)
    start_date = models.DateField()
    ending_date = models.DateField()
    title = models.CharField(max_length=50)
    status = models.BooleanField(default=True)
    create_at = models.DateTimeField(auto_now_add=True)

    class Meta:
        app_label = 'curriculum'
        db_table = 'educations_user'

    def __str__(self):
        return self.education.name+ "/" +self.institute.name


class Courses(models.Model):
    name = models.CharField(max_length=100)
    status = models.BooleanField(default=True)
    create_at = models.DateTimeField(auto_now_add=True)

    class Meta:
        app_label = 'curriculum'
        db_table = 'courses'

    def __str__(self):
        return self.name


class CoursesUser(models.Model):
    user = models.ForeignKey(
       settings.AUTH_USER_MODEL,
       on_delete=models.CASCADE,
       related_name='c_user')
    institute = models.ForeignKey(Institutes)
    course = models.ForeignKey(Courses)
    start_date = models.DateField()
    ending_date = models.DateField()
    status = models.BooleanField(default=True)
    create_at = models.DateTimeField(auto_now_add=True)

    class Meta:
        app_label = 'curriculum'
        db_table = 'courses_user'

    def __str__(self):
        return self.course.name+ "/" +self.institute.name


class Skills(models.Model):
    name = models.CharField(max_length=100)
    status = models.BooleanField(default=True)
    create_at = models.DateTimeField(auto_now_add=True)

    class Meta:
        app_label = 'curriculum'
        db_table = 'skills'

    def __str__(self):
        return self.name


class SkillsUser(models.Model):
    __types = (
       (1, 1),
       (2, 2),
       (3, 3),
       (4, 4),
       (5, 5),
    )
    user = models.ForeignKey(
       settings.AUTH_USER_MODEL,
       on_delete=models.CASCADE,
       related_name='s_user')
    level = models.SmallIntegerField(
       default=1, choices=__types)
    skill = models.ForeignKey(Skills)
    status = models.BooleanField(default=True)
    create_at = models.DateTimeField(auto_now_add=True)

    class Meta:
        app_label = 'curriculum'
        db_table = 'skills_user'

    def __str__(self):
        return self.skill.name


class LanguajesUser(models.Model):
    __types = (
       (1, "Basic"),
       (2, "Medium"),
       (3, "Advanced"),
    )
    user = models.ForeignKey(
       settings.AUTH_USER_MODEL,
       on_delete=models.CASCADE,
       related_name='l_user')
    level = models.SmallIntegerField(
       default=1, choices=__types)
    languaje = models.ForeignKey('common.Languajes')
    status = models.BooleanField(default=True)
    create_at = models.DateTimeField(auto_now_add=True)

    class Meta:
        app_label = 'curriculum'
        db_table = 'languajes_user'

    def __str__(self):
        return self.languaje.name


class Classifications(models.Model):
    name = models.CharField(max_length=50)
    category = models.CharField(max_length=50)
    status = models.BooleanField(default=True)
    create_at = models.DateTimeField(auto_now_add=True)

    class Meta:
        app_label = 'curriculum'
        db_table = 'classifications'

    def __str__(self):
        return self.name


class Portfolios(models.Model):
    user = models.ForeignKey(
       settings.AUTH_USER_MODEL,
       on_delete=models.CASCADE,
       related_name='p_user')
    classification = models.ForeignKey(
        # Classifications, related_name='classification')
        Classifications, related_name='classification_portfolio')
    name = models.CharField(max_length=50)
    image = models.CharField(max_length=250, blank=True, null=True)
    status = models.BooleanField(default=True)
    create_at = models.DateTimeField(auto_now_add=True)

    class Meta:
        app_label = 'curriculum'
        db_table = 'portfolios'

    def __str__(self):
        return self.name
