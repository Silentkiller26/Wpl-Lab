---------------hire table insert query--------
INSERT INTO `hire`(`hno`, `sno`, `phone_no`) VALUES ('[value-1]','[value-2]','[value-3]')
---------------labour table insert query--------
INSERT INTO `labour`(`lid`, `l_type`, `l_name`, `gender`, `age`, `email`, `phone_no`, `address`, `post_code`, `l_image`, `hourly_rate`) VALUES ('[value-1]','[value-2]','[value-3]','[value-4]','[value-5]','[value-6]','[value-7]','[value-8]','[value-9]','[value-10]','[value-11]')
---------------others_required table insert query--------
INSERT INTO `others_required`(`serial_no`, `labour_type`, `place`, `quantity`, `date`, `time`, `description`, `phone_no`) VALUES ('[value-1]','[value-2]','[value-3]','[value-4]','[value-5]','[value-6]','[value-7]','[value-8]')
---------------schedule table insert query--------
INSERT INTO `schedule`(`sno`, `lid`, `available_place`, `available_date`, `start_time`, `end_time`, `status`) VALUES ('[value-1]','[value-2]','[value-3]','[value-4]','[value-5]','[value-6]','[value-7]')
---------------user table insert query--------
INSERT INTO `user`(`name`, `occupation`, `email`, `phone_no`, `address`, `post_code`, `gender`, `attempt`, `timestamp`, `usertype`, `password`) VALUES ('[value-1]','[value-2]','[value-3]','[value-4]','[value-5]','[value-6]','[value-7]','[value-8]','[value-9]','[value-10]','[value-11]')